@extends('layouts.adminpagelayouts.master')

@section('title')
    Home
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-10"></div>
            <div class="col-xl-2" style="background-color: #ff8b77; 
                                        padding-left:0">
                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-10" style="background-color: #fce5ff; 
                                            text-align: center">
                        <h5 style="color: #b91e1a">Blog Categories</h5>
                    </div>
                    <div class="col-1"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2">
                <input type="button" class="btn btn-primary" Value="New Category" style="width: 100%" onclick="alert('Hello')">
            </div>
        </div>
        <div class="row" style="margin-top: 20px;">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th class="Actions" colspan="2">Actions</th>
                        <th>ID</th>
                        <th>BlogCategory</th>
                        <th>IsView?</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($blogCategories as $blogCategory)
                        <tr>
                            <td class="buttonAction"><input type="button" class="btn btn-link" Value="Edit" ></td>
                            <td class="buttonAction"><input type="button" class="btn btn-link" Value="Delete"></td>
                            <td class="eachRow">{{$blogCategory->id}}</td>
                            <td class="eachRow">{{$blogCategory->blogCategory}}</td>
                            <td class="eachRow">{{$blogCategory->isView >= 1 ? "True" : "False"}}</td>
                        </tr>
                        @empty
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
<style>
    .table .buttonAction{
        width: 10px; 
        padding-top: 0px; 
        padding-bottom: 0px;
    }
    .table .eachRow{
        padding-top: 0px; 
        padding-bottom: 0px;
        vertical-align: middle;
    }
</style>

