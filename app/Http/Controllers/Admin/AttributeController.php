<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AttributeFormRequest;
use App\Models\Attribute;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    public function index()
    {
        return view('admin.attribute.index');
    }

    public function create()
    {
        return view('admin.attribute.create');
    }

    public function store(AttributeFormRequest $request)
    {
        $validatedData = $request->validated();

        $attribute = new Attribute;
        $attribute->attribute_name = $validatedData['attribute_name'];
        $attribute->attribute_status = $validatedData['attribute_status'];

        $attribute->save();

        return redirect('admin/attribute')->with('message', 'Attribute added successfully');
    }

    public function edit(Attribute $attribute)
    {
        return view('admin.attribute.edit', compact('attribute'));
    }

    public function update(AttributeFormRequest $request, $attribute)
    {
        $validatedData = $request->validated();

        $attribute = Attribute::findOrFail($attribute);


        $attribute->attribute_name = $validatedData['attribute_name'];
        $attribute->attribute_status = $validatedData['attribute_status'];

        $attribute->update();

        return redirect('admin/attribute')->with('message', 'Attribute updated successfully');
    }
}
