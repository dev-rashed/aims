<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Yajra\DataTables\Facades\DataTables;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('show_order');
        if (request()->ajax()) {
            $orders = Order::query()->with('user:id,first_name,last_name', 'membershipPlan:id,name', 'payment:id,relation_id,subtotal,discount,total');

            return DataTables::eloquent($orders)
                ->addIndexColumn()
                ->addColumn('membership_expire', function ($data) {
                    return formatDate($data->created_at->addYear(1));
                })
                ->addColumn('action', function ($data) {
                    return $this->buttonGroup([
                        ['url' => route('staff.order.show', $data->id), 'type' => 'show', 'id' => false, 'can' => 'show_order'],
                        ['url' => route('staff.order.destroy', $data->id), 'type' => 'delete', 'can' => 'delete_order'],
                    ]);
                })
                ->rawColumns(['action', 'membership_expire'])
                ->toJson();
        }

        return view('staff.order.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        $order->load('user:id,first_name,last_name', 'membershipPlan:id,name');

        return view('staff.order.show', compact('order'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $this->authorize('delete_order');
        $order->delete();

        return response()->json(['message' => translate('deleted_message', ['text' => 'Order'])]);
    }
}
