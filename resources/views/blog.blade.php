@extends('template.layout')
@section('title', "Tourism Blog")

@section('content')
    <div class="col-md-12 mt-3">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div>
                    @if(Auth::check())
                        @if(Auth::user()->role == 'User')
                            <a href="{{route('blog.add.page')}}">
                                <button type="button" class="btn btn-lg w-50 btn-dark"  id="create">+ Create Blog</button>
                            </a>
                        @endif
                    @endif
                </div>
                <div>
                    <table class="table mt-3">
                        <thead>
                        <tr>
                            <th scope="col">Title</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(isset($blogs))
                            @foreach($blogs as $blog)
                                <tr>
                                    <td><a href="{{route('blog.get.detail', [$blog->id])}}">{{$blog->title}}</a></td>
                                    <td>
                                        @if(Auth::check())
                                            <form action="{{ route('blog.delete', [$blog->id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Are you sure want to remove {{$blog->title}} ?')" class="btn border-0 btn-danger">
                                                    <i style="color: white" class="fas fa-trash-alt delete"></i> DELETE
                                                </button>
                                            </form>
                                        @endif
                                    </td>
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
