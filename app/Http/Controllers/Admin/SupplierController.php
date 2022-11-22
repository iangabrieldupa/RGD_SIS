<?php

namespace App\Http\Controllers\Admin;

use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SupplierFormRequest;

class SupplierController extends Controller
{
    public function index()
    {
        return view('admin.supplier.index');
    }

    public function create()
    {
        return view('admin.supplier.create');
    }

    public function store(SupplierFormRequest $request)
    {
        $validatedData = $request->validated();

        $supplier = new Supplier;
        $supplier->supplier_name = $validatedData['supplier_name'];
        $supplier->supplier_address = $validatedData['supplier_address'];
        $supplier->supplier_contact_no = $validatedData['supplier_contact_no'];

        $supplier->save();

        return redirect('admin/supplier')->with('message', 'Supplier added successfully');
    }

    public function edit(Supplier $supplier)
    {
        return view('admin.supplier.edit', compact('supplier'));
    }

    public function update(SupplierFormRequest $request, $supplier)
    {
        $validatedData = $request->validated();

        $supplier = Supplier::findOrFail($supplier);


        $supplier->supplier_name = $validatedData['supplier_name'];
        $supplier->supplier_address = $validatedData['supplier_address'];
        $supplier->supplier_contact_no = $validatedData['supplier_contact_no'];

        $supplier->update();

        return redirect('admin/supplier')->with('message', 'Supplier updated successfully');
    }
}
