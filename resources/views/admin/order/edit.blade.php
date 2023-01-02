@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            @if(session('message'))
            <div>
                <h2 class="alert alert-success">{{ session('message') }}</h2>
            </div>
            @endif
            <form action="{{ url('/admin/order') }}" method="POST" enctype="multipart/form-data">
              @method('post')
                @csrf
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="bill_no">Bill No.</label>
                    <input value="{{ $order->bill_no }}" type="text" class="form-control" name="bill_no" placeholder="Bill No.">
                  </div>

                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="product_id">Product ID</label>
                    <input value="{{ $order->product_id }}" type="text" class="form-control" name="product_id" placeholder="Product ID">
                  </div>

                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="gross_amount">Gross Amount</label>
                    <input value="{{ $order->gross_amount }}" type="text" class="form-control" name="gross_amount" placeholder="Gross Amount">
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="service_charge">Service Charge</label>
                      <input value="{{ $order->service_charge }}" type="text" class="form-control" name="service_charge" placeholder="Service Charge">
                    </div>



                    <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="net_amount">Net Amount</label>
                      <input value="{{ $order->net_amount }}" type="text" class="form-control" name="net_amount" placeholder="Net Amount">
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="discount">Discount</label>
                          <input value="{{ $order->discount }}" type="text" class="form-control" name="discount" placeholder="Discount">
                        </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label for="post_status">Post Status</label>
                        <input value="{{ $order->post_status }}" type="text" class="form-control" name="post_status" placeholder="Post Status">
                    </div>

                <button type="submit" class="btn btn-primary">Update Order</button>
              </form>
        </div>
    </div>
</div>

@endsection

