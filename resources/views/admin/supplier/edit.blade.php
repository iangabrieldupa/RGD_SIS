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
                <h4>Edit Supplier
                    <a href="{{ url('admin/supplier') }}" class="btn btn-primary btn-sm text-white float-end">Back</a>
                </h4>
            </div>
            <div class="card-body">
                <form action="{{ url('admin/supplier/'.$supplier->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label>Supplier Name</label>
                                <input type="text" name="supplier_name" value="{{ $supplier->supplier_name }}" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Supplier Address</label>
                                <input type="text" name="supplier_address" value="{{ $supplier->supplier_address }}" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Supplier Contact Number</label>
                                <input type="text" name="supplier_contact_no" value="{{ $supplier->supplier_contact_no }}" class="form-control">
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
