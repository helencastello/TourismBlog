<ul class="navbar-nav navbar-dark mr-auto">
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle"  href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Category
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <ul>
                @foreach ($categories as $category)
                    <a class="dropdown-item" href="{{route('get.page.category',[$category->id])}}">{{ $category->name}}</a>
                @endforeach
            </ul>
        </div>
    </li>
</ul>
