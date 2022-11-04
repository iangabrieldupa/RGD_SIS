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

        $attribute->save();

        return redirect('admin/attribute')->with('message', 'Attrbiute added successfully');
    }
}
