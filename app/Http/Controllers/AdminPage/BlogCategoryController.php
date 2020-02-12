<?php

namespace App\Http\Controllers\AdminPage;

use App\BlogCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $BlogCategory = BlogCategory::paginate(10);
        return view('adminpage.blogcategoryindex')
            ->with('blogCategories', $BlogCategory);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminpage.blogcategorycreate')
            -> with('blogcategory', (new BlogCategory()));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        alert("Hello");
        // dd($request->all());

        // $blogcategory = BlogCategory::create($request->input());

        // DB::table('tbblogcategories') -> insert([
        //     'blogCategory' => $request->blogCategory,
        //     'isView' => $request->isView,
        //     'isDeleted' => "0"
        // ]);
        // return redirect()->action('AdminPage\BlogCategoryController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlogCategory $blogcategory)
    {
        // dd($blogcategory->all());
        $blogcategory->delete();
        return redirect()->action('AdminPage\BlogCategoryController@index');
    }
}
