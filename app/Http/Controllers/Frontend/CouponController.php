<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\CouponRequest;
use App\Models\Coupon;
use App\Models\Course;
use App\Models\Event;
use App\Models\MembershipPlan;

class CouponController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(CouponRequest $request)
    {
        $coupon = Coupon::where('code', $request->code)->where('expire_date', '>=', date('Y-m-d'))->where('status', true)->first();

        if (! $coupon) {
            return response()->json(['message' => translate('invalid_coupon_code')], 300);
        }

        if ($request->from == 'course') {
            $course = Course::where('slug', $request->course)->first();
            if ($course) {
                $price = $course->price;
            }
        } elseif ($request->from == 'event') {
            $event = Event::where('slug', $request->event)->first();
            if ($event) {
                $price = $event->price;
            }
        } elseif ($request->from == 'membership') {
            $membership = MembershipPlan::where('slug', $request->membership_plan)->first();
            if ($membership) {
                $price = $request->membership_type == 'yearly' ? $membership->yearly_price : $membership->monthly_price;
            }
        }

        if ($coupon->discount_type == Coupon::DISCOUNT_TYPE_FIXED) {
            $discount = $coupon->discount;
        } else {
            $discount = ($coupon->discount / 100) * $price ?? 0;
        }

        session()->forget('coupon');
        session()->put('coupon', [
            'price' => $price ?? 0,
            'code' => $coupon->code,
            'discount' => $discount,
        ]);

        return response()->json([
            'message' => translate('coupon_applied'),
            'coupon' => session()->get('coupon'),
        ]);
    }
}
