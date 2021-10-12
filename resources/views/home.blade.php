@extends('template.layout')
@section('title', "TourismBlog")

@section('content')

    @if (isset($error_message) && $error_message !== [])
        <div class="alert alert-danger mt-5" role="alert">
            {{ $error_message ? $error_message : null }}
        </div>
    @endif

    @if (Auth::check())
        @if (Auth::user()->role == 'User')
            <div class="m-3">
                <h3>
                    Welcome {{$user->name}}
                </h3>
            </div>
        @elseif (Auth::user()->role == 'Admin')
            @include('view-all-post')
        @endif
    @else
        @include('view-all-post')
    @endif

@endsection


