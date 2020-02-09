<?php

namespace App\Http\Controllers;

use App\BlogCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogCategoryController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        // Booking::withTrashed()->get()->dd();
        // $booking = Booking::paginate(1);
        // $BlogCategory = BlogCategory::get();
        // return view('adminpage.blogcategory');
            // 
            
    }
    public function index(){
        $BlogCategory = BlogCategory::paginate(1);
        return view('adminpage.blogcategory')
            ->with('blogCategories', $BlogCategory);
    }
}
