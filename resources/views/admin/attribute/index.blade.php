@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Product Attributes
                    <a href="{{ url('admin/attribute/create') }}" class="btn btn-primary float-end">Add Attributes</a>
                </h4>
            </div>
            <div class="card-body">

            </div>
        </div>
    </div>
</div>

@endsection
