@extends('backend.components.layout')

@section('title') Manage Product @endsection

@section('content')

<!--breadcrumb-->
<div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
    <div class="breadcrumb-title pr-3">Dashboard</div>
    <div class="pl-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class='bx bx-home-alt'></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Manage Product</li>
            </ol>
        </nav>
    </div>
    <div class="ml-auto">
        <div class="btn-group">
            <a href="{{ route('staff.product.create') }}" class="btn btn-primary"><i class="bx bx-plus"></i> Add
                Products</a>
        </div>
    </div>
</div>
<!--end breadcrumb-->

<x-session-message />

<div class="card">
    <div class="card-body">
        <div class="card-title">
            <h4 class="mb-0">Manage Products</h4>
        </div>
        <hr />
        <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Status</th>
                        <th>Create_by</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                    <tr>

                        <td></td>
                        <td class="d-flex justify-content-center">
                            <form action="{{ route('staff.product.edit', $product->id) }}" method="GET">
                                @csrf
                                <button class="btn btn-light-warning btn-sm mr-1"><i class="bx bx-edit"></i></button>
                            </form>
                            <form action="{{ route('staff.product.destroy', $products->id) }}" method="POST">
                                @csrf
                                @method('Delete')
                                <button class="btn btn-danger btn-sm ml-1"><i class="bx bx-eraser"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
