@extends('layouts.master')

@section('title')
    Edit User
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-hidden">
                        <h4>Edit User</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <form action="/update-user?id={{ $user->id }}" method="POST">
                                    {{ csrf_field() }}
                                   
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{ $user->name}}" placeholder="Name">
                                    </div>
                                    <div class="form-group">
                                        <label>Email address</label>
                                        <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" aria-describedby="emailHelp" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <label>User Type</label>
                                        <select name="usertype" id="usertype">
                                            <option value="admin">Admin</option>
                                            <option value="editor">Editor</option>
                                            <option value="writer">Writer</option>
                                        </select>
                                    </div>
                                    <a href="/user" id="btncancel" class="btn btn-danger btn-circle">Candel</a>
                                    <button type="submit" id="btnupdate" class="btn btn-success btn-circle">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection