@extends('backend.components.layout')

@section('title') Manage Category @endsection

@section('content')

<!--breadcrumb-->
<div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
    <div class="breadcrumb-title pr-3">Dashboard</div>
    <div class="pl-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class='bx bx-home-alt'></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Manage Category</li>
            </ol>
        </nav>
    </div>
    <div class="ml-auto">
        <div class="btn-group">
            <a href="{{ route('staff.category.create') }}" class="btn btn-primary"><i class="bx bx-plus"></i> Add
                Category</a>
        </div>
    </div>
</div>
<!--end breadcrumb-->

@if (session('message')) <div class="alert alert-danger alert-dismissible fade show text-bold" role="alert">
    {{ session('message') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<div class="card">
    <div class="card-body">
        <div class="card-title">
            <h4 class="mb-0">Manage Categories</h4>
        </div>
        <hr />
        <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Status</th>
                        <th>Create_by</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->slug }}</td>
                        <td>{{ $category->status }}</td>
                        <td>{{ $category->user->name }}</td>
                        <td class="d-flex justify-content-center">
                            <form action="{{ route('staff.category.edit', $category->id) }}" method="GET">
                                @csrf
                                <button class="btn btn-light-warning btn-sm mr-1"><i class="bx bx-edit"></i></button>
                            </form>
                            <form action="{{ route('staff.category.destroy', $category->id) }}" method="POST">
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
