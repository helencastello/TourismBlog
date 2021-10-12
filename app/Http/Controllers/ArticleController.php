<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function blogPage() {
        $user = Auth::user();
        $blog = DB::table('articles')
            ->where('user_id', '=', $user->id)
            ->select()
            ->get();
        return view('blog')->with('blogs', $blog);
    }

    public function addBlogPage() {
        $categories = Category::all();
        return view('add-blog')->with('categories', $categories);
    }

    public function addBlog(Request $request) {
        $this->validate($request, [
            'title' => 'required',
            'story' => 'required',
            'category' => 'required',
            'file' => 'required'
        ]);

        $user = Auth::user();

        $article = new Article();
        $article->user_id = $user->id;
        $article->category_id = $request->category;
        $article->title = $request->title;
        $article->description = $request->story;
        $image_path = $request->file('file')->store('images', 'public');
        $article->image = $image_path;
        $article->save();

        return redirect()->route('blog.page');
    }

    public function getBlogDetail($articleId) {
        $article = Article::find($articleId);
        return view('view-detail-post', [
            'article'=> $article
        ]);
    }

    public function getBlogByCategory($categoryId) {
        $user = Auth::user();
        $post = DB::table('articles')
            ->where('category_id', '=', $categoryId)
            ->select()
            ->get();
        foreach ($post as $b) {
            $b->category = DB::table('categories')
                ->where('id', '=', $b->category_id)
                ->first('name');
        }
        $categoryName = Category::find($categoryId)
            ->name;
        return view('home', [
            'user' => $user,
            'articles' => $post,
            'categoryName' => $categoryName
        ]);
    }

    public function deleteBlog($articleId) {
        $article = Article::find($articleId);
        Storage::disk('public')->delete($article->image);
        $article->delete();

        if(Auth::user()->role == 'Admin') {
            return redirect()->route('home.page');
        }
        return redirect()->route('blog.page');
    }

    public function getUserBlogPage($userId) {
        $post = DB::table('articles')
            ->where('user_id', '=', $userId)
            ->select()
            ->get();
        return view('blog', ['blogs' => $post]);
    }
}
