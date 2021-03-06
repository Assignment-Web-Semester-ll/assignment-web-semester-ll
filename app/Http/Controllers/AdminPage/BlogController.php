<?php

namespace App\Http\Controllers\AdminPage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blog = DB::table('tbblogs')
        ->where('isDeleted', 0)
        ->orderBy('id', 'desc')
        ->paginate(10);
        return view('adminpage.blog_index')
            ->with('blogs', $blog);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $blogs = DB::table('tbblogs')->where('id', $request->id)->first();
        return view('adminpage.blog_create')
            ->with('blogs', $blogs);
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
        $photoName = "";

        if(isset($request->addPhoto)){
            $photoInfo =  PostPhoto($request);
            if(isset($photoInfo) && $photoInfo->getStatusCode() == 200){
                $photoName = json_decode($photoInfo->content())->image;
            }
        }

        $id = DB::table('tbblogs') -> insertGetId([
            'blogCode' => $request->blogCode,
            'title' => $request->title,
            'content' => $request->content,
            'bogCategoryId' => $request->bogCategoryId,
            'reportUserId' => $request->reportUserId,
            'isApproved' => ConvertStringToBoolean($request->isApproved),
            'isDeleted' => ConvertStringToBoolean($request->isDeleted),
            'isView' => $request->isView,
            'featureImage' => $photoName,
        ]);

        return response($id, 200);
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
    
    public function edit(int $id)
    {
        $getID = $id;

        $blogCategory = DB::table('tbblogcategories')->pluck('categoryName', 'id');
        // // $blog = DB::table('tbblogs')
        // // ->where('id', $id)
        // // ->where('isDeleted', 0)
        // // ->first();

        return view('adminpage.blog')
            ->with('isNew', 0)
            ->with('blogCategory', $blogCategory);
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
    public function destroy($id)
    {
        //
    }
}
