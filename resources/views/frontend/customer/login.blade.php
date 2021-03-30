@extends('frontend.components.layout')

@section('title')
    Login
@endsection

@section('content')
    {{-- @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li> {{ $error }}</li>
            @endforeach
        </ul>
    @endif --}}
    <div class="container">
        <div class="row justify-content-center mt-4 mb-3">
            <div class="col-md-8 d-flex justify-content-lg-between border-bottom pb-2">
                <h4 class="m-0">Customer Login</h4>
                <h6 class="m-0 pt-2">New member? <a href="{{ route('customer.register') }}">Register</a> here</h6>
            </div>
        </div>
        <div class="row justify-content-center text-center">
            @if (session('login_error'))
                <div class="col-md-8 alert alert-danger }}">{{ session('login_error') }}</div>
            @endif
        </div>

        <form action="{{ route('customer.login') }}" method="POST">
            @csrf
            <div class="row justify-content-center mb-5">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="phone_email">Phone Number or Email</label>
                        <input type="text" class="form-control" name="phone_email" id="phone_email"
                            value="{{ old('phone_email') }}" style="height: 16px">
                        <span>@error('phone_email') <div class="text-danger" style="font-size: 12px"> {{ $message }}
                                </div>
                            @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password" style="height: 16px">
                        <span>@error('password') <div class="text-danger" style="font-size: 12px"> {{ $message }}
                                </div>
                            @enderror</span>
                    </div>
                    <a href="javascript:">Forget Password?</a>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for=""></label>
                        <input type="submit" name="submit" value="Sign_In" class="btn btn-block btn-warning">
                    </div>
                    <label for="">or login with</label>
                    <div class="form-group">
                        <a href="javascript:" class="btn btn-block btn-primary btn-sm">Facebook</a>
                    </div>
                    <div class="form-group">
                        <a href="javascript:" class="btn btn-block btn-danger btn-sm">Google</a>
                    </div>
                </div>
        </form>
    </div>

@endsection
