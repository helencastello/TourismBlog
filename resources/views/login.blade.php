@extends('template.layout')
@section('title', "Tourism Blog")

@section('content')

    <form action="{{ url('/login') }}" method="POST">

        {{ csrf_field() }}

        <div class="col-md-12">
            @if (isset($error_message))
                <div class="alert alert-danger">
                    {{$error_message}}
                </div>
            @endif
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="form-group">
                        <label for="role">Login as:</label>
                        <select style="height: 40px" class="form-control" name="role" id="role">
                            <option value="User">User</option>
                            <option value="Admin">Admin</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="text">E-mail:</label>
                        <input type="text" class="form-control" name="email" id="email" placeholder="Enter email">
                        <small>
                            @if (isset($errors) && $errors->has('email'))
                                <div style="color:indianred">
                                    {{$errors->first('email')}}
                                </div>
                            @endif
                        </small>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="text" class="form-control" name="password" id="password" placeholder="Enter password">
                        <small>
                            @if (isset($errors) && $errors->has('password'))
                                <div style="color:indianred">
                                    {{$errors->first('password')}}
                                </div>
                            @endif
                        </small>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" name="login" class="btn btn-lg w-50 btn-dark"  id="login">Sign-Up</button>
                        <div class="mt-2">
                            <input type="checkbox" name="rememberMe" id="rememberMe"> Remember Me
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <a href="#" style="color: palevioletred;">Forgot Your Password?</a>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection

