@extends('layouts.adminpagelayouts.master')

@section('title')
    Blog
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
                        <h5 style="color: #b91e1a">Blog</h5>
                    </div>
                    <div class="col-1"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2">
                <!-- Trigger the modal with a button -->
                <a href="/blog/create" class="btn btn-primary" style="width: 100%"> Add New</a>
                <!-- <input type="button" class="btn btn-primary" Value="Add New" style="width: 100%"  data-toggle="modal" id="btnCreate"> -->
            </div>
        </div>
        <div class="row" style="margin-top: 20px;">
            <table id="tbCategory" class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>BlogCode</th>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Comment</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($blogs as $blog)
                        <tr>
                            <td class="buttonAction">
                                <input type="button" class="btn btn-link btnEdit" Value="Edit" >
                            </td>
                            <td class="buttonAction">
                                {{-- <a href="{{ URL::to('/blog/destory', ['blog' => $blog->id]) }}" class="btn btn-link">Delete</a> --}}
                                {{-- <form action="{{ action('AdminPage\BlogController@destroy', ['blog' => $blog->id]) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <input type="submit" class="btn btn-link" Value="Delete">
                                </form> --}}
                                <input type="button" class="btn btn-link btnDelete" Value="Delete" data-code="{{$blog->id}}">
                            </td>
                            <td class="eachRow">{{$blog->id}}</td>
                            <td class="eachRow">{{$blog->blogCode}}</td>
                            <td class="eachRow">{{$blog->title}}</td>
                            <td class="eachRow">{{$blog->content}}</td>
                            <td class="eachRow">{{$blog->comment}}</td>
                            <td class="eachRow">{{$blog->isApproved}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        @include('commoncomponent.loading')
        {{ ( $blogs->links()) }}
    </div>
@endsection
@section('javascript')
    <script type="text/javascript">
        $(document).ready(function () {
            var tableclicked = null;
            /*********************************
            *       Delete Blog Category
            **********************************/
            $(document).on('click', '#tbCategory .btnDelete', function(e){

                var code = $(this).attr('data-code');
                console.log(code);
                // OR
                var tr = $(this).closest('tr');
                e.preventDefault();
                $.ajax({
                    type: 'DELETE',
                    url: "/blog/destory" + tr.find('td:eq(2)').html(),
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data){
                        tr.find('td').remove();
                    },
                    error: function(data){
                        $("#loadMe").modal("hide");
                        console.log(data);
                    }
                });
            }); 
            /*********************************
            *       Edit Blog Category
            **********************************/
            $(document).on('click', '#tbCategory .btnEdit', function(e){
                tableclicked = $(this);
                var tr = $(this).closest('tr');
                var code = tr.find('td:eq(2)').html();
                e.preventDefault();
                $.ajax({
                    type: 'GET',
                    url: "/blog/edit/" + tr.find('td:eq(2)').html(),
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data){
                        // $("#editCategoryId").val(data && data.id ? data.id :"Auto Generate");
                        // $("#editCategoryName").val(data && data.categoryName ? data.categoryName :"");
                        // $("#editCategoryCode").val(data && data.categoryCode ? data.categoryCode :"");
                        // data && data.isView 
                        // ? data.isView == 1 
                        //     ? $("#editIsView").attr('checked', true) 
                        //     : $("#editIsView").attr('checked', false) 
                        // : $("#editIsView").attr('checked', false);
                        
                        // console.log(data);
                    },
                    error: function(data){
                        $("#loadMe").modal("hide");
                        console.log(data);
                    }
                });
            });
        });
    </script>
@stop