@extends('template.layout')
@section('title', "Tourism Blog")

@section('content')

    <form action="{{ url('/register') }}" method="POST">

        {{ csrf_field() }}

        <div class="col-md-12">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name">
                        <small>
                            @if (isset($errors) && $errors->has('name'))
                                <div style="color:indianred">
                                    {{$errors->first('name')}}
                                </div>
                            @endif
                        </small>
                    </div>
                    <div class="form-group">
                        <label for="text">E-mail:</label>
                        <input type="text" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                        <small>
                            @if (isset($errors) && $errors->has('email'))
                                <div style="color:indianred">
                                    {{$errors->first('email')}}
                                </div>
                            @endif
                        </small>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone:</label>
                        <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter Phone Number">
                        <small>
                            @if (isset($errors) && $errors->has('phone'))
                                <div style="color:indianred">
                                    {{$errors->first('phone')}}
                                </div>
                            @endif
                        </small>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="text" class="form-control" name="password" id="password" placeholder="Enter Password">
                        <small>
                            @if (isset($errors) && $errors->has('password'))
                                <div style="color:indianred">
                                    {{$errors->first('password')}}
                                </div>
                            @endif
                        </small>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" name="register" class="btn btn-lg w-50 btn-dark"  id="register">Register</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection

