<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductFormRequest;

class ProductController extends Controller
{
    public function index()
    {
        return view('admin.product.index');
    }

    public function create()
    {
        $products = Product::all();
        return view('admin.product.create', compact('products'));
    }

    public function store(ProductFormRequest $request)
    {
        // $validatedData = $request->validated();

        $product = new Product;
        $product->product_name = $request['product_name'];
        $product->sku = $request['sku'];
        $product->product_unit_price = $request['product_unit_price'];
        $product->quantity = $request['quantity'];
        $product->product_image = $request['product_image'];
        $product->product_description = $request['product_description'];
        $product->brand_id = $request['brand_id'];
        // $product->brand_id = $request['brand_name'];

        $product->category_id = $request['category_id'];
        // $product->category_id = $request['category_name'];
        $product->unit_id = $request['unit_id'];
        // $product->unit_id = $request['unit_name'];
        $product->vat_type = $request['vat_type'];

        $product->save();

        return redirect('admin/product')->with('message', 'Product added successfully');
    }

    public function edit(Product $product)
    {
        return view('admin.product.edit', compact('product'));
    }

    public function update(ProductFormRequest $request, $product)
    {
        $validatedData = $request->validated();

        $product = Product::findOrFail($product);

        $product->product_name = $validatedData['product_name'];
        $product->sku = $validatedData['sku'];
        $product->product_unit_price = $validatedData['product_unit_price'];
        $product->quantity = $validatedData['quantity'];
        $product->product_image = $validatedData['product_image'];
        $product->product_description = $validatedData['product_description'];
        $product->brand_id = $validatedData['brand_id'];
        $product->category_id = $validatedData['category_id'];
        $product->unit_id = $validatedData['unit_id'];
        $product->vat_type = $validatedData['vat_type'];

        $product->update();

        return redirect('admin/product')->with('message', 'Product updated successfully');
    }
}
