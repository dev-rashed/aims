<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\CourseRequest;
use App\Models\Counsellor;
use App\Models\Course;
use App\Models\Enroll;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the education page
     */
    public function index(Request $request)
    {
        $data['type'] = ucfirst($request->get('type')) == Course::TYPE_ONLINE ? Course::TYPE_ONLINE : Course::TYPE_ADVANCED;

        $data['counsellors'] = Counsellor::latest('id')->get();
        $data['courses'] = Course::ofType($data['type'])->latest('id')->get();

        return view('frontend.course.index', compact('data'));
    }

    /**
     * Display the specified resource.
     */
    public function details($slug)
    {
        $course = Course::with('counsellor:id,first_name,last_name,image', 'language:id,name', 'modules')->withCount('enrolls')->where('slug', $slug)->firstOrFail();
        $courses = Course::ofType($course->type)->latest('id')->get();

        return view('frontend.course.details', compact('course', 'courses'));
    }

    /**
     * Display the specified resource.
     */
    public function enroll($slug)
    {
        session()->forget('coupon');
        $course = Course::with('counsellor:id,first_name,last_name,image', 'language:id,name')->where('slug', $slug)->firstOrFail();

        return view('frontend.course.checkout', compact('course'));
    }

    /**
     * checkout a new course
     */
    public function checkout(CourseRequest $request)
    {
        $coupon = session()->has('coupon') ? session()->get('coupon') : null;
        $course = Course::where('slug', $request->course)->first(['id', 'price']);
        $total = ((int) $course->price) - ($coupon['discount'] ?? 0);
        $payment = PaymentController::stripe($request, $total);

        if (gettype($payment) !== 'boolean') {
            return response()->json(['message' => $payment], 300);
        }

        if (! auth()->check()) {
            if (User::where('username', generateSlug("$request->first_name $request->last_name"))->first()) {
                $username = generateSlug("$request->first_name $request->last_name").rand();
            }

            $user = User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'phone' => $request->phone,
                'username' => $username ?? generateSlug("$request->first_name $request->last_name"),
                'password' => bcrypt($request->password),
            ]);
        } else {
            $user = User::find(auth()->id());
        }

        $enroll = Enroll::create([
            'course_id' => $course->id,
            'user_id' => $user->id,
            'address' => $request->address,
        ]);

        $data = [
            'from' => Payment::FOR_ENROLL,
            'subtotal' => $course->price,
            'discount' => $coupon['discount'] ?? 0,
            'total' => $total,
            'card_name' => $request->card_name,
            'card_number' => $request->card_number,
        ];

        return CheckoutController::successCheckout($enroll, $user, $data);

    }
}
