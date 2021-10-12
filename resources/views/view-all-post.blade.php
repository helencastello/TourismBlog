<div class="mt-5">
    @if(isset($categoryName) && $categoryName != null)
        Category  : {{$categoryName}}
    @endif
    <div class="ml-5">
        <div class="row mb-5">
            @if(isset($articles))
                @foreach ($articles as $article)
                    <div class="col-4 mt-5">
                        <div class="card" style="width: 30rem; height: auto">
                            <div class="card-body">
                                <h5 class="card-title">{{$article->title}}</h5>
                                <p>
                                    {{ \Illuminate\Support\Str::words($article->description, 20, $end='') }}
                                    <a href="{{ route('blog.get.detail', [$article->id]) }}">...full story</a>
                                </p>
                                <i>Category : <a href="{{route('get.page.category', [$article->category_id])}}">{{$article->category->name}}</a></i>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>
