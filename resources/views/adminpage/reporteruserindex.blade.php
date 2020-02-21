@extends('layouts.adminpagelayouts.master')

@section('title')
    Reporter User
@endsection

@section('css')
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
        .label{
            margin-bottom: 10px;
        }
        .marginBottom{
            margin-bottom: 10px;
        }
    </style>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row label">
            <div class="col-xl-10"></div>
            <div class="col-xl-2" style="background-color: #ff8b77; 
                                        padding-left:0">
                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-10" style="background-color: #fce5ff; 
                                            text-align: center">
                        <h5 style="color: #b91e1a">Reporter User</h5>
                    </div>
                    <div class="col-1"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2">
                <!-- Trigger the modal with a button -->
                <input type="button" class="btn btn-primary" Value="New User" style="width: 100%"  data-toggle="modal" data-target="#ModalCreate">
            </div>
        </div>
        <div class="row" style="margin-top: 20px;">
            <table id="tbCategory" class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th class="Actions" colspan="3">Actions</th>
                        <th style="display:none">ID</th>
                        <th>FullName</th>
                        <th>UserName</th>
                        <th>Email</th>
                        <th>Is Admin?</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($reporterUsers as $reporterUser)
                        <tr>
                            <td class="buttonAction">
                                <input type="button" class="btn btn-link btnEdit" Value="Edit" >
                            </td>
                            <td class="buttonAction">
                                <input type="button" class="btn btn-link btnDelete" Value="Delete">
                            </td>
                            <td class="buttonAction">
                                <input type="button" class="btn btn-link btnView" Value="View">
                            </td>
                            <td class="eachRow" style="display:none">{{ $reporterUser->id }}</td>
                            <td class="eachRow">{{ $reporterUser->fullname }}</td>
                            <td class="eachRow">{{ $reporterUser->username }}</td>
                            <td class="eachRow">{{ $reporterUser->email }}</td>
                            <td class="eachRow">{{ $reporterUser->isAdmin >= 1 ? "True" : "False" }}</td>
                        </tr>
                        @empty
                    @endforelse
                </tbody>
            </table>
        </div>
        @include('adminpage.reporterusercreate')
        {{-- @include('adminpage.blogcategoryedit') --}}
        {{-- @include('commoncomponent.loading') --}}
        {{-- {{ ( $blogCategories->links()) }} --}}
    </div>
@endsection

@section('javascript')
    <script type="text/javascript">
        $(document).ready(function () {
            var tableclicked = null;
            
        });
    </script>
@stop

