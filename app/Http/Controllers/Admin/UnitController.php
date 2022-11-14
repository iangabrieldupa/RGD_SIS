<?php

namespace App\Http\Controllers\Admin;

use App\Models\Unit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UnitFormRequest;

class UnitController extends Controller
{
    public function index()
    {
        return view('admin.unit.index');
    }

    public function create()
    {
        return view('admin.unit.create');
    }

    public function store(UnitFormRequest $request)
    {
        $validatedData = $request->validated();

        $unit = new Unit;
        $unit->unit_name = $validatedData['unit_name'];

        $unit->save();

        return redirect('admin/unit')->with('message', 'Unit added successfully');
    }

    public function edit(Unit $unit)
    {
        return view('admin.unit.edit', compact('unit'));
    }

    public function update(UnitFormRequest $request, $unit)
    {
        $validatedData = $request->validated();

        $unit = Unit::findOrFail($unit);


        $unit->unit_name = $validatedData['unit_name'];

        $unit->update();

        return redirect('admin/unit')->with('message', 'Unit updated successfully');
    }
}
