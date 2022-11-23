<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\OrderFormRequest;

class OrderController extends Controller
{
    public function index()
    {
        return view('admin.order.index');
    }

    public function create()
    {
        return view('admin.order.create');
    }

    public function store(OrderFormRequest $request)
    {
        // $validatedData = $request->validated();

        $order = new Order;
        $order->bill_no = $request['bill_no'];
        $order->product_id = $request['product_id'];
        $order->gross_amount = $request['gross_amount'];
        $order->service_charge = $request['service_charge'];
        $order->vat_charge = $request['vat_charge'];
        $order->net_amount = $request['net_amount'];
        $order->discount = $request['discount'];
        $order->post_status = $request['post_status'];

        $order->save();

        return redirect('admin/order')->with('message', 'Order added successfully');
    }

    public function edit(Order $order)
    {
        return view('admin.order.edit', compact('order'));
    }

    public function update(OrderFormRequest $request, $order)
    {
        $validatedData = $request->validated();

        $order = Order::findOrFail($order);


        $order->bill_no = $request['bill_no'];
        $order->product_id = $request['product_id'];
        $order->gross_amount = $request['gross_amount'];
        $order->service_charge = $request['service_charge'];
        $order->vat_charge = $request['vat_charge'];
        $order->net_amount = $request['net_amount'];
        $order->discount = $request['discount'];
        $order->post_status = $request['post_status'];
        $order->mode_of_payment = $request['mode_of_payment'];

        $order->update();

        return redirect('admin/order')->with('message', 'Order updated successfully');
    }
}
