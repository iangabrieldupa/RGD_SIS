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
            <form>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="product_name">Product name</label>
                    <input type="text" class="form-control" id="product_name" placeholder="Name of the Product">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="sku">SKU</label>
                    <input type="text" class="form-control" id="sku" placeholder="sku">
                  </div>
                </div>
                <div class="form-group">
                  <label for="product_unit_price">Product Unit Price</label>
                  <input type="text" class="form-control" id="product_unit_price" placeholder="Price of the Product">
                </div>
                <div class="form-group">
                  <label for="quantity">Quantity</label>
                  <input type="text" class="form-control" id="quantity" placeholder="Quantity of the Product">
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="product_image">Product Image</label>
                    <input type="text" class="form-control" id="product_image">
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="product_description">Product Description</label>
                      <input type="text" class="form-control" id="product_description">
                    </div>

                    @php
                         $brands = DB::table('product_brands')->get();
                         $categories = DB::table('product_categories')->get();
                         $units = DB::table('units')->get();
                    @endphp

                  <div class="form-group col-md-4">
                    <label for="product_brand">Product Brand</label>
                    <select id="product_brand" class="form-control">
                      <option selected>No brand</option>
                      <table>
                        @foreach ($brands as $item)
                            <option>{{ $item->brand_name }}</option>
                        @endforeach
                    </table>
                    </select>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="product_category">Product Category</label>
                    <select id="product_category" class="form-control">
                      <option selected>No category</option>
                      <table>
                        @foreach ($categories as $item)
                            <option>{{ $item->category_name }}</option>
                        @endforeach
                    </table>
                    </select>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="product_unit">Product Unit</label>
                    <select id="product_unit" class="form-control">
                      <option selected>No unit</option>
                      <table>
                        @foreach ($units as $item)
                            <option>{{ $item->unit_name }}</option>
                        @endforeach
                    </table>
                    </select>
                  </div>
                  <div class="form-group col-md-2">
                    <label for="vat_type">Vat Type</label>
                    <input type="text" class="form-control" id="vat_type">
                  </div>
                </div>
                <button type="submit" class="btn btn-primary">Add Product</button>
              </form>
        </div>
    </div>
</div>

@endsection