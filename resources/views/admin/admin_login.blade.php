@extends('master_layout.master')
@section('admin_login')


<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="row justify-content-center w-100">
        <div class="col-lg-6 col-md-8 col-sm-10">
            <div class="card">
                <img src="{{asset('assets/img/logo.png')}}" alt="Logo" class="logo">
                <div class="card-body">
                    <h5 class="card-title text-center">Admin Login</h5>
                    @if (Session::has('error'))
                    <strong>{{session::get('error')}}</strong>
                    @endif
                    
                    <form  action="{{route('admin.login')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="username">Email</label>
                            <input type="text" class="form-control"  name="email" placeholder="Enter your username" required>
                        </div>
                        <div class="form-group mt-3">
                            <label for="password">Password</label>
                            <input type="password" class="form-control"  name="password" placeholder="Enter your password" required>
                        </div>
                        <button type="submit" class="btn btn-primary mt-4 w-100">Login</button>
                    </form>
                    <a href="register.html" class="register-link">New user? Create an account</a>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection