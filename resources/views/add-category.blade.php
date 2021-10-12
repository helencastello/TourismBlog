@extends('template.layout')
@section('title', "Tourism Blog")

@section('content')
    <div class="border p-3">

        <form action="{{ route('category.add') }}" method="POST">

            {{ csrf_field() }}

            <div class="col-md-12">
                @if (isset($error_message))
                    <div class="alert alert-danger">
                        {{$error_message}}
                    </div>
                @endif
                <div class="row justify-content-center">
                    <div class="col-md-5">
                        <h3>New Category</h3>
                        <div class="form-group">
                            <label for="name">Category Name:</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Enter Category Name">
                            <small>
                                @if (isset($errors) && $errors->has('name'))
                                    <div style="color:indianred">
                                        {{$errors->first('name')}}
                                    </div>
                                @endif
                            </small>
                            </select>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-lg w-50 btn-dark" id="create">Create</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection

