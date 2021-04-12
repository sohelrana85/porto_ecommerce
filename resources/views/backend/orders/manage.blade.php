@extends('backend.components.layout')

@section('title') Manage Order @endsection

@section('content')

    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
        <div class="breadcrumb-title pr-3">Dashboard</div>
        <div class="pl-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class='bx bx-home-alt'></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Manage Orders</li>
                </ol>
            </nav>
        </div>
        <div class="ml-auto">
            <div class="btn-group">
                {{-- <a href="{{ route('staff.order.create') }}" class="btn btn-primary btn-sm"><i class="bx bx-plus"></i>
                    Add
                    Products</a> --}}
            </div>
        </div>
    </div>
    <!--end breadcrumb-->

    <x-session-message />

    <div class="card">
        <div class="card-body">
            <div class="card-title">
                <h4 class="mb-0">Manage Orders</h4>
            </div>
            <hr />
            <div id="tabledata">
                hello
            </div>
        </div>
    </div>

@endsection
