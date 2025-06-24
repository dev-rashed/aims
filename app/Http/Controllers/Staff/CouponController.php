<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Http\Requests\Staff\CouponRequest;
use App\Models\Coupon;
use Yajra\DataTables\Facades\DataTables;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('show_coupon');
        if (request()->ajax()) {
            $coupons = Coupon::query();

            return DataTables::of($coupons)
                ->addIndexColumn()
                ->editColumn('discount_type', function ($data) {
                    return ucfirst($data->discount_type);
                })
                ->editColumn('expire_date', function ($data) {
                    return formatDate($data->expire_date);
                })
                ->addColumn('action', function ($data) {
                    return $this->buttonGroup([
                        ['url' => route('staff.coupon.edit', $data->id), 'type' => 'edit', 'can' => 'edit_coupon'],
                        ['url' => route('staff.coupon.destroy', $data->id), 'type' => 'delete', 'can' => 'delete_coupon'],
                    ]);
                })
                ->rawColumns(['action'])
                ->toJson();
        }

        return view('staff.coupon.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $discount_types = [Coupon::DISCOUNT_TYPE_FIXED, Coupon::DISCOUNT_TYPE_PERCENTAGE];

        return view('staff.coupon.form', compact('discount_types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CouponRequest $request)
    {
        Coupon::create($request->all());

        return response()->json(['message' => translate('added_message', ['text' => 'coupon'])]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Coupon $coupon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Coupon $coupon)
    {
        $discount_types = [Coupon::DISCOUNT_TYPE_FIXED, Coupon::DISCOUNT_TYPE_PERCENTAGE];

        return view('staff.coupon.form', compact('discount_types', 'coupon'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CouponRequest $request, Coupon $coupon)
    {
        $coupon->update($request->all());

        return response()->json(['message' => translate('updated_message', ['text' => 'Coupon'])]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Coupon $coupon)
    {
        $this->authorize('delete_coupon');
        $coupon->delete();

        return response()->json(['message' => translate('deleted_message', ['text' => 'Coupon'])]);
    }
}
