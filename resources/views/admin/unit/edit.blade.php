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
            <div class="card-header">
                <h4>Edit Unit
                    <a href="{{ url('admin/unit') }}" class="btn btn-primary btn-sm text-white float-end">Back</a>
                </h4>
            </div>
            <div class="card-body">
                <form action="{{ url('admin/unit/'.$unit->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label>Unit Name</label>
                                <input type="text" name="unit_name" value="{{ $unit->unit_name }}" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Status</label>
                                <select name="unit_status" id="unit_status" value="{{ $unit->unit_status }}">
                                    <option value="Active">Active</option>
                                    <option value="Inactive">Inactive</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary float-end">Update</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
