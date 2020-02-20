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
        $BlogCategory = DB::table('tbblogcategories')
        ->where('isDeleted', 0)
        ->orderBy('id', 'desc')
        ->paginate(10);
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
        $input = $request->all();
        DB::table('tbblogcategories') -> insert([
            'categoryCode' => $request->categoryCode,
            'categoryName' => $request->categoryName,
            'isView' => $request->isView,
            'isDeleted' => 0
        ]);
        // return response(200);
        return response()->json(['success'=>$request->all()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $input = $id;
        // dd($id->all());
        // return dump($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $result = DB::table('tbblogcategories')
        ->where('id', $id)
        ->where('isDeleted', 0)
        ->first();
        return response()->json($result);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(int $id, Request $request)
    {
        $getRequest = $request->all();
        $getId = $id;
        DB::table('tbblogcategories')
        ->where('id', $id)
        ->update([
            'categoryCode' => $request->categoryCode,
            'categoryName' => $request->categoryName,
            'isView' => $request->isView,
            'isDeleted' => 0
        ]);
        $result = DB::table('tbblogcategories')->where('id', $id)->first();
        return response()->json($result);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int  $id)
    {
        // dd($blogcategory->all());
        // $blogcategory->delete();
        // return redirect()->action('AdminPage\BlogCategoryController@index');
        $input = $id;
        // DB::table('tbblogcategories')->where('id', $id)->delete();
        DB::table('tbblogcategories')
        ->where('id', $id)
        ->update([
            'isDeleted' => 1
        ]);
        return response(200);
    }
}
