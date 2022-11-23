<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\BrandFormRequest;

class BrandController extends Controller
{
    public function index()
    {
        return view('admin.brand.index');
    }

    public function create()
    {
        return view('admin.brand.create');
    }

    public function store(BrandFormRequest $request)
    {
        $validatedData = $request->validated();

        $brand = new Brand;
        $brand->brand_name = $validatedData['brand_name'];
        $brand->brand_status = $validatedData['brand_status'] == true ? '0': '1';

        $brand->save();

        return redirect('admin/brand')->with('message', 'Brand added successfully');
    }

    public function edit(Brand $brand)
    {
        return view('admin.brand.edit', compact('brand'));
    }

    public function update(BrandFormRequest $request, $brand)
    {
        $validatedData = $request->validated();

        $brand = Brand::findOrFail($brand);


        $brand->brand_name = $validatedData['brand_name'];
        $brand->brand_status = $validatedData['brand_status'] == true ? '0': '1';

        $brand->update();

        return redirect('admin/brand')->with('message', 'Brand updated successfully');
    }
}
