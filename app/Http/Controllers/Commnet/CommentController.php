<?php

namespace App\Http\Controllers\Commnet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    public function index()
    {
        $comments = DB::table('tb_comment')
        ->where('isDeleted', 0)
        ->orderBy('id')
        ->paginate(10);
        return view('comment.comment_list')
            ->with('comments', $comments);
    }

    public function show()
    {

    }

    public function edit()
    {
        
    }

    public function update(Request $request)
    {
        
    }
}