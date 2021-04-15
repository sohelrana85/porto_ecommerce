<?php

namespace App\Http\Controllers\staff;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Exception;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::with('customer', 'shipping', 'order_details', 'payment')->get();
        return view('backend.orders.manage', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::where('id', $id)->with('customer', 'shipping', 'order_details', 'payment')->first();
        return view('backend.orders.order-details', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $status = Order::where('id', $id)->with('payment')->first();
        return view('backend.orders.edit-status', compact('status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function order_status_change(Request $request, $id)
    {
        if ($request->ajax()) {

            $order_id = $id;
            $order_status = $request->order_value;

            try {
                $order = Order::where('id', $order_id)->firstOrFail();

                $order->status = $order_status;
                $order->update();

                return response()->json(['success' => 'updated']);
            } catch (Exception $e) {
                return response()->json(['error' => $e->getMessage()]);
            }
        }
    }

    public function order_status_update(Request $request, $id)
    {
        if ($request->ajax()) {
            $order = Order::where('id', $id)->first();
            return view('backend.orders.update-status', compact('order'));
        }
    }
}
