@extends('template.layout')
@section('title', "Tourism Blog")

@section('content')

    <form action="{{ route('blog.add') }}" enctype="multipart/form-data" method="POST">

        {{ csrf_field() }}

        <div class="col-md-12">
            @if (isset($error_message))
                <div class="alert alert-danger">
                    {{$error_message}}
                </div>
            @endif
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <h3>New Blog</h3>
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="Enter Title">
                        <small>
                            @if (isset($errors) && $errors->has('title'))
                                <div style="color:indianred">
                                    {{$errors->first('title')}}
                                </div>
                            @endif
                        </small>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="category">Category:</label>
                        <select  style="height: 40px" class="form-control" name="category" id="category">
                            @if(isset($categories))
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}" >{{$category->name}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="category">Photo:</label>
                        <div class="img-reset">
                            <input type="file" class="form-control" id="file" name="file">
                            @if ($errors->has('file'))
                                <span class="alert-danger">{{ $errors->first('file') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="story">Story:</label>
                        <textarea type="text" class="form-control text-left" name="story" id="story">
                            </textarea>
                        <small>
                            @if (isset($errors) && $errors->has('story'))
                                <div style="color:indianred">
                                    {{$errors->first('story')}}
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

@endsection

