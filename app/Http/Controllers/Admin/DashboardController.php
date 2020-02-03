<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class DashboardController extends Controller
{
    public function registered()
    {
        $users = User::all();
        return view('admin.register')->with('users', $users);
    }

    public function editUser(Request $request)
    {
        $input = $request->all();
        $id = $input['id'];
        $user = User::findOrFail($id);
        return view('admin.edit_user')->with('user', $user);
    }

    public function updateUser(Request $request)
    {
        $input = $request->all();
        $id = $input['id'];
        $users = User::find($id);
        $users->name = $request->input('name');
        $users->email = $request->input('email');
        $users->usertype = $request->input('usertype');
        $users->update();
        return redirect('/user')->with('status', 'Record is updated');
    }

    public function deleteUser(Request $request)
    {
        $input = $request->all();
        $id = $input['id'];
        $users = User::findOrFail($id);
        $users->delete();
        return redirect('/user')->with('status', 'Record is deleted');
    }
}
