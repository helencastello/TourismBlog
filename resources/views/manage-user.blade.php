@extends('template.layout')
@section('title', "Tourism Blog")

@section('content')
    <div class="col-md-12 mt-3">
        @if (isset($error_message))
            <div class="alert alert-danger">
                {{$error_message}}
            </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-5 mt-5">
                <div>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(isset($users))
                            @foreach($users as $user)
                                <tr>
                                    <td><a href="{{route('manage.user.blog', [$user->id])}}">{{$user->name}}</a></td>
                                    <td><a>{{$user->email}}</a></td>
                                    <td>
                                        @if(Auth::check())
                                            @if (Auth::user()->role == 'Admin')
                                                <form action="{{ route('user.delete', [$user->id]) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" onclick="return confirm('Are you sure want to remove {{$user->name}} ?')" class="btn border-0 btn-danger">
                                                        <i style="color: white" class="fas fa-trash-alt delete"></i> DELETE
                                                    </button>
                                                </form>
                                            @endif
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

        <div class="text-center">To manage user's blogs, please click on user's name</div>
    </div>

@endsection
