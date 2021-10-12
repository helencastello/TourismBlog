@extends('template.layout')
@section('title', "Tourism Blog")

@section('content')
    <div class="mt-5">
        <div class="ml-5">
            <div class="row mb-5">
                @if(isset($article))
                    <div class="col-5">
                        <div class="card-body">
                            <h3 class="card-title">{{$article->title}}</h3>
                            <div>
                                <img src="{{ asset('storage/'.$article->image) }}" alt="" width="350" height="350">
                            </div>
                            <p class="mt-4">
                                {{$article->description}}
                            </p>


                            <a href="{{ URL::previous() }}">
                                <button class="btn btn-lg mt-5 w-50 btn-dark">Back</button>
                            </a>
                            @if(Auth::check())
                                @if(Auth::user()->role == 'Admin')
                                    <form action="{{ route('blog.delete', [$article->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Are you sure want to remove {{$article->title}} ?')"
                                                class="btn btn-lg mt-2 w-50 btn-danger">
                                            Delete
                                        </button>
                                    </form>
                                @endif
                            @endif
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

