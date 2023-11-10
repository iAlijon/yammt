@extends('Admin.layouts.auth-app')

@section('content')
    <div class="login-box">
            <div class="login-logo">
                <b>Yagona milliy mehnat tizimi</b>
            </div>

            <div class="card">
                <p class="login-box-msg">LOGIN</p>
                <div class="card-body login-card-body">
                    @if ($errors->any())
                        <div class="alert alert-default-danger">
                            {{$errors->first()}}
                        </div>
                    @endif
                    <form action="{{route('login')}}" method="POST">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Login" name="name" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" placeholder="Parol" name="password" required autocomplete="current-password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8">
                                <div class="icheck-primary">
                                    <input type="checkbox" id="remember">
                                    <label for="remember">
                                        Remember Me
                                    </label>
                                </div>
                            </div>

                            <div class="col-4">
                                <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
    </div>

@endsection
