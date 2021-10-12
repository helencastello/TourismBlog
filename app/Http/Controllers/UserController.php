<?php

namespace App\Http\Controllers;

use App\Article;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function homePage() {
        $user = Auth::user();
        $post = Article::all();
        foreach ($post as $b) {
            $b->category = DB::table('categories')
                ->where('id', '=', $b->category_id)
                ->first('name');
        }
        return view('home', [
            'user' => $user,
            'articles' => $post,
            'categoryName' => null
        ]);
    }

    public function profilePage() {
        $user = Auth::user();
        return view('profile')->with('user', $user);
    }

    public function updateProfile(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required|numeric',
        ]);

        $user = Auth::user();
        $user = User::find($user->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->save();

        $success_message = 'Profile Updated!';
        return view('profile', [
            'message' => $success_message,
            'user' =>$user
        ]);
    }

    public function aboutUsPage() {
        return view('about-us');
    }

    public function manageUser() {
        $user = DB::table('users')
            ->where('role','=', 'User')
            ->select()
            ->get();
        return(view('manage-user', ['users' => $user]));
    }

    public function deleteUser($userId) {
        $user = User::find($userId);
        $user->delete();

        $user = DB::table('users')
            ->where('role','=', 'User')
            ->select()
            ->get();
        return(view('manage-user', ['users' => $user]));
    }
}
