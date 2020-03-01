<?php

namespace App\Http\Controllers\AdminPage;

use App\BlogCategory;
use App\ReporterUser;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ReporterUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ReporterUsers = DB::table('tbreporterusers')
        ->where('isDeleted', 0)
        ->orderBy('id', 'desc')
        ->paginate(10);
        return view('adminpage.reporteruserindex')
            ->with('reporterUsers', $ReporterUsers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $input = $request->all();
        $photoName = "";

        if(isset($request->image)){
            $photoInfo =  PostPhoto($request);
            if(isset($photoInfo) && $photoInfo->getStatusCode() == 200){
                $photoName = json_decode($photoInfo->content())->image;
            }
        }

        DB::table('tbreporterusers') -> insert([
            'fullname' => $request->createFullName,
            'username' => $request->createUserName,
            'password' => $request->createPassword,
            'email' => $request->createEmail,
            'dob' => $request->createDateofBirth,
            'profilePhoto' => $photoName,
            'isAdmin' => ConvertStringToBoolean($request->createIsAdmin),
            'isDeleted' => 0
        ]);

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
        $result = DB::table('tbreporterusers')
        ->where('id', $id)
        ->where('isDeleted', 0)
        ->first();
        return response()->json($result);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $result = DB::table('tbreporterusers')
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
    public function update(Request $request, $id)
    {
        $input = $request->all(); 
        $getID = $id;
        $photoName = "";

        if(isset($request->image)){
            $photoInfo =  PostPhoto($request);
            if(isset($photoInfo) && $photoInfo->getStatusCode() == 200){
                $photoName = json_decode($photoInfo->content())->image;
            }
        }
        if(isset($photoName) && $photoName != ""){
            $insertstr = [
                'fullname' => $request->createFullName,
                'username' => $request->createUserName,
                'password' => $request->createPassword,
                'email' => $request->createEmail,
                'dob' => $request->createDateofBirth,
                'profilePhoto' => $photoName,
                'isAdmin' => ConvertStringToBoolean($request->createIsAdmin),
                'isDeleted' => 0
            ];
        }else{
            $insertstr = [
                'fullname' => $request->createFullName,
                'username' => $request->createUserName,
                'password' => $request->createPassword,
                'email' => $request->createEmail,
                'dob' => $request->createDateofBirth,
                'isAdmin' => ConvertStringToBoolean($request->createIsAdmin),
                'isDeleted' => 0
            ];
        }

        DB::table('tbreporterusers')
        ->where('id', $id)
        ->update($insertstr);
        $result = DB::table('tbreporterusers')->where('id', $id)->first();
        return response()->json($result);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $input = $id;
        DB::table('tbreporterusers')
        ->where('id', $id)
        ->update([
            'isDeleted' => 1
        ]);
        return response(200);
    }
}
