@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header"><a href="{{ url('admin/order') }}" class="btn btn-primary float-end">Back</a></div>
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
                    <input type="text" class="form-control" name="bill_no" placeholder="Bill No.">
                  </div>

                  <div class="form-group col-md-4">
                    <label for="products">Products</label>
                    <select name="product_id" class="form-control">
                      <option selected></option>
                      <table>
                        @foreach ($products as $item)
                            <option value="{{ $item->id }}">{{ $item->product_name }}</option>
                        @endforeach
                    </table>
                    </select>
                  </div>

                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="gross_amount">Gross Amount</label>
                    <input type="text" class="form-control" name="gross_amount" placeholder="Gross Amount">
                  </div>

                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="service_charge">Service Charge</label>
                      <input type="text" class="form-control" name="service_charge" placeholder="Service Charge">
                    </div>



                    <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="net_amount">Net Amount</label>
                      <input type="text" class="form-control" name="net_amount" placeholder="Net Amount">
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="discount">Discount</label>
                        <input type="text" class="form-control" name="discount" placeholder="Discount">
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label for="post_status">Post Status</label>
                        <input type="text" class="form-control" name="post_status" placeholder="Post Status">
                    </div>

                <button type="submit" class="btn btn-primary">Add Order</button>
              </form>
        </div>
    </div>
</div>

@endsection

