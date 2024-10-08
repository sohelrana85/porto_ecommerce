@extends('backend.components.layout')

@section('title')
Update Category

@endsection
@section('content')

<!--breadcrumb-->
<div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
    <div class="breadcrumb-title pr-3">Dashboard</div>
    <div class="pl-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class='bx bx-home-alt'></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Update Categories</li>
            </ol>
        </nav>
    </div>
    <div class="ml-auto">
        <div class="btn-group">
            <a href="{{ route('staff.category.index') }}" class="btn btn-primary"><i class="bx bx-plus"></i> Manage
                Category</a>
        </div>
    </div>
</div>
<!--end breadcrumb-->
<div class="row">
    <div class="col-12 col-lg-9 mx-auto">

        @if (session('message'))
        <div class="alert alert-{{ session('type') }} alert-dismissible fade show text-bold" role="alert">
            {{ session('message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span
                    aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        <div class="card radius-15">
            <div class="card-body">
                <div class="card-title">
                    <h4 class="mb-0">Update Category</h4>
                </div>
                <hr />
                <div class="form-body">
                    <form action="{{ route('staff.category.update', $cat->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="root">Root Category</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="root" id="root">
                                    <option value="0">-- Root --</option>

                                    {!! getCategory($categories, 2, $cat->root) !!}

                                    {{-- @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{$category->id == $cat->root ? 'selected':''}}>
                                        {{ $category->name }}</option>
                                    @if (count($category->sub_category))
                                    @foreach ($category->sub_category as $sub_cat)
                                    <option value="{{ $sub_cat->id }}" {{$sub_cat->id == $cat->root ? 'selected':''}}>
                                        {{ $category->name }} > {{ $sub_cat->name }}
                                    </option>
                                    @endforeach

                                    @endif
                                    @endforeach --}}
                                </select>
                                @error('root')<p class="text-danger font-italic"> {{ $message }} </p> @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Category Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control" value="{{ $cat->name }}">
                                @error('name')<p class="text-danger font-italic"> {{ $message }} </p> @enderror
                            </div>
                        </div>
                        <div class="form-group row align-items-center">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-5">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="active" value="active" name="status"
                                        class="custom-control-input" {{ $cat->status == 'active' ?
                                        'checked':'' }}>
                                    <label class="custom-control-label" for="active">Active</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="inactive" value="inactive" name="status"
                                        class="custom-control-input" {{ $cat->status == 'inactive' ?
                                        'checked':'' }}>
                                    <label class="custom-control-label" for="inactive">Inactive</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10 text-right">
                                <button type="submit" value="submit" class="btn btn-primary px-4">Update
                                    Category</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
