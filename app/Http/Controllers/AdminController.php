<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Comment;
use App\Models\Admin;

class AdminController extends Controller
{
    public function index()
    {
        $comments = Comment::orderBy('id', 'Desc')->get();
        return view('admin.home', compact('comments'));
    }

    public function login()
    {
        return view('admin.login');
    }

    public function handleLogin(Request $req)
    {
        if(Auth::guard('admin')->attempt($req->only(['username', 'password'])))
        {
            return redirect()
                ->route('admin.home');
        }

        return redirect()
            ->back()
            ->with('error', 'Invalid Credentials');
    }

    public function logout()
    {
        Auth::guard('admin')
            ->logout();

        return redirect()
            ->route('admin.login');
    }

    public function addComment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'comment' => 'required'
        ]);
    
        if ($validator->fails()) {
            return redirect()
                        ->route('admin.home')
                        ->withErrors($validator)
                        ->withInput();
        }

        $comment                  = new Comment;
        $comment->comment         = request('comment');
        $comment->authorable_id   = Auth::user()->id;
        $comment->authorable_type = "admin";     
        $comment->save();

        return redirect()
                ->route('admin.home')
                ->with('success', 'New Comment Added Successfully.');
    }
}
