<?php
// namespace App\Helper;

use Illuminate\Http\Request;

if(!function_exists('PostPhoto')){
    function PostPhoto(Request $request){
        $input = $request->all();
        request()->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imageName = time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images'), $imageName);
        return response()->json([
            'success'=>'You have successfully upload image.',
            'image' => $imageName
        ]);
    }
}