@extends('template.layout')
@section('title', 'TourismBlog')

@section('content')
    @if (session('success'))
        <div class="alert alert-success mt-2">
            {{session('success')}}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <ul>
                    <li>{{$error}}</li>
                </ul>
            @endforeach
        </div>
    @endif

    <div class="container-fluid text-center">
        <div  class="container-text mt-2">

            <div class="row justify-content-center">
                <div class="centered">
                    <div style="font-size: 40px; font-weight: bold">T O U R I S M <br> B L O G</div>
                    <div style="font-size: 18px;">The Journey of a Thousand Miles Begin with The First Step</div>
                </div>
            </div>

            <div class="row black-text justify-content-center mt-5">
                <div class="center-img" style="opacity: 0.4">
                </div>
                <div class="centered text" style="color: black">
                    <div>
                        <div style="font-size: 40px; font-weight: bold">CONTACT US</div>
                        <div style="font-size: 18px;">We Are Here For You!</div>
                    </div>

                    <div style="margin-top: 20px">

                        <form  action="{{ url('/contact-us') }}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="{{old('name')}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="{{old('email')}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="subject" class="col-sm-2 col-form-label">Subject</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" value="{{old('subject')}}">
                                </div>
                            </div>
                            <fieldset class="form-group">
                                <div class="row">
                                    <label class="col-form-label col-sm-2 pt-0">Type of Problem</label>
                                    <div class="col-sm-10">
                                        <div class="text-left">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="complaint" checked>
                                                <label class="form-check-label ml-5" for="gridRadios1">
                                                    Complaint
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="question">
                                                <label class="form-check-label ml-5" for="gridRadios2">
                                                    Question
                                                </label>
                                            </div>
                                            <div class="form-check disabled">
                                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="other">
                                                <label class="form-check-label ml-5" for="gridRadios3">
                                                    Other
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <div class="form-group row">
                                <label for="message" class="col-sm-2 col-form-label">Message</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="message" id="message" rows="3" placeholder="Message" type="text"></textarea>
                                </div>
                            </div>
                            <div class="form-group row justify-content-center">
                                <button type="submit" class="btn btn-dark" id="sendBtn">Send Mesage</button>
                            </div>
                        </form>
                    </div>


                    <div style="margin-top: 40px">
                        <div style="font-size: 18px;">Or you can reach us through our customer support too!</div>
                        <div style="font-size: 18px; font-weight: bold">Telp: 666-666-666-666</div>
                        <div style="font-size: 18px; font-weight: bold">tourism-blog-support@gmail.com</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
