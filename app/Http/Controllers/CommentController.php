<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $attributes = $request->all();
        $attributes['user_id'] = Auth::user()->id;
        Comment::create($attributes);

        return Redirect::back();
    }
}
