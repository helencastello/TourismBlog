@extends('template.layout')
@section('title', "Tourism Category")

@section('content')
    <div class="col-md-12 mt-3">
        @if (isset($error_message))
            <div class="alert alert-danger">
                {{$error_message}}
            </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div>
                    <a href="{{route('category.add.page')}}">
                        <button type="button" class="btn btn-lg w-50 btn-dark"  id="create">+ Create Category</button>
                    </a>
                </div>
                <div>
                    <table class="table mt-3">
                        <thead>
                        <tr>
                            <th scope="col">Category Name</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(isset($categories))
                            @foreach($categories as $category)
                                <tr scope="row">
                                    <td><a>{{$category->name}}</a></td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
