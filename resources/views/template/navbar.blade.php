<div class="container">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            @if (Auth::check())
                @if (Auth::user()->role == 'Admin')
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4">
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item ml-2">
                                        <a class="nav-link" href="{{route('home.page')}}">Home</a>
                                    </li>
                                    <li class="nav-item mr-2">
                                        <a class="nav-link" href="{{route('category.page')}}">Category</a>
                                    </li>
                                    <li class="nav-item mr-2">
                                        <a class="nav-link" href="{{route('profile.page')}}">Admin</a>
                                    </li>
                                    <li class="nav-item mr-2">
                                        <a class="nav-link" href="{{route('manage.user')}}">User</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <ul class="navbar-nav ml-auto float-right">
                                    <li class="nav-item ml-2">
                                        <a class="nav-link" href="{{route('logout')}}"><i class="fa fa-sign-out mr-2"></i>Logout</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @elseif (Auth::user()->role == 'User')
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4">
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item ml-2">
                                        <a class="nav-link" href="{{route('home.page')}}">Home</a>
                                    </li>
                                    <li class="nav-item mr-2">
                                        <a class="nav-link" href="{{route('profile.page')}}">Profile</a>
                                    </li>
                                    <li class="nav-item mr-2">
                                        <a class="nav-link" href="{{route('blog.page')}}">Blog</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <ul class="navbar-nav ml-auto float-right">
                                    <li class="nav-item ml-2">
                                        <a class="nav-link" href="{{route('logout')}}"><i class="fa fa-sign-out mr-2"></i>Logout</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif
            @else
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-4">
                            <ul class="navbar-nav just">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('home.page')}}">Home</a>
                                </li>
                                @include('category-navbar',['categories' => App\Category::all()])
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('about.us')}}">About Us</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <ul class="navbar-nav ml-auto float-right">
                                <li class="nav-item ml-2">
                                    <a class="nav-link" href="{{route('register')}}"><i class="fa fa-user mr-2"></i>Sign-up</a>
                                </li>
                                <li class="nav-item mr-2">
                                    <a class="nav-link" href="{{route('login')}}"><i class="fa fa-sign-in mr-2"></i>Login</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </nav>
</div>
