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
            <form action="{{ url('admin/product/'.$product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="product_name">Product name</label>
                    <input name="product_name" value="{{ $product->product_name }}" type="text" class="form-control" id="product_name" placeholder="Name of the Product">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="sku">SKU</label>
                    <input name="sku"  value="{{ $product->sku }}" type="text" class="form-control" id="sku" placeholder="sku">
                  </div>
                </div>
                <div class="form-group">
                  <label for="product_unit_price">Product Unit Price</label>
                  <input name="product_unit_price" value="{{ $product->product_unit_price }}" type="text" class="form-control" id="product_unit_price" placeholder="Price of the Product">
                </div>
                <div class="form-group">
                  <label for="quantity">Quantity</label>
                  <input name="quantity" value="{{ $product->quantity }}" type="text" class="form-control" id="quantity" placeholder="Quantity of the Product">
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="product_image">Product Image</label>
                    <input name="product_image" value="{{ $product->product_image }}" type="text" class="form-control" id="product_image">
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="product_description">Product Description</label>
                      <input name="product_description" value="{{ $product->product_description }}" type="text" class="form-control" id="product_description">
                    </div>

                    @php
                         $brands = DB::table('product_brands')->get();
                         $categories = DB::table('product_categories')->get();
                         $units = DB::table('units')->get();
                    @endphp

                  <div class="form-group col-md-4">
                    <label for="product_brand">Product Brand</label>
                    <select id="product_brand" name="brand_id" class="form-control">
                        {{-- <option>{{$product->brands->brand_name}}</option> --}}
                            @foreach ($brands as $item)
                            @if($item->brand_status == 1)
                                <option value="{{ $item->id }}" {{$item->id == $product->brand_id ? 'selected' : ''}}>
                                    {{$item->brand_name}}
                                </option>
                            @endif
                            @endforeach
                    </select>
                  </div>
                  <div class="form-group col-md-4">

                    <label for="product_category">Product Category</label>
                    <select id="product_category" name="category_id" class="form-control">
                        {{-- <option>{{$product->categories->category_name}}</option> --}}
                              @foreach ($categories as $item)
                                  @if($item->category_status == 1)
                                      <option value="{{ $item->id}}" {{$item->id == $product->category_id ? 'selected' : ''}}>{{$item->category_name}}</option>
                                  @endif
                              @endforeach
                      </select>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="product_unit">Product Unit</label>
                    <select id="product_unit" name="unit_id" class="form-control">
                        {{-- <option>{{$product->units->unit_name}}</option> --}}
                          @foreach ($units as $item)
                              <option value="{{ $item->id }}" {{$item->id == $product->unit_id ? 'selected' : ''}}>{{ $item->unit_name }}</option>
                          @endforeach

                      </select>
                  </div>
                  <div class="form-group col-md-2">
                    <label for="vat_type">Vat Type</label>
                    <input name="vat_type" value="{{ $product->vat_type }}" type="text" class="form-control" id="vat_type">
                  </div>
                </div>
                <button type="submit" class="btn btn-primary">Update Product</button>
              </form>
        </div>
    </div>
</div>

@endsection
