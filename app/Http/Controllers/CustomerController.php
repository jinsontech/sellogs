<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Comment;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index()
    {
        $comments = Comment::orderBy('id', 'Desc')->get();
        return view('customer.home', compact('comments'));
    }

    public function login()
    {
        return view('customer.login');
    }

    public function handleLogin(Request $req)
    {
        if(Auth::attempt($req->only(['username', 'password'])))
        {
            return redirect()
                ->route('customer.home');
        }

        return redirect()
            ->back()
            ->with('error', 'Invalid Credentials');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()
            ->route('customer.login');
    }

    public function addComment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'comment' => 'required'
        ]);
    
        if ($validator->fails()) {
            return redirect()
                        ->route('customer.home')
                        ->withErrors($validator)
                        ->withInput();
        }

        $comment                  = new Comment;
        $comment->comment         = request('comment');
        $comment->authorable_id   = Auth::user()->id;
        $comment->authorable_type = "customer";     
        $comment->save();

        return redirect()
                ->route('customer.home')
                ->with('success', 'New Comment Added Successfully.');
    }
}
