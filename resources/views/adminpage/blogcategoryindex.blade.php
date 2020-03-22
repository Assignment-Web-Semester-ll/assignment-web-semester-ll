@extends('layouts.adminpagelayouts.master')

@section('title')
    Home
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
                        <h5 style="color: #b91e1a">Blog Categories</h5>
                    </div>
                    <div class="col-1"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2">
                <!-- Trigger the modal with a button -->
                <input type="button" class="btn btn-primary" Value="New Category" style="width: 100%"  data-toggle="modal" data-target="#ModalCreate">
            </div>
        </div>
        <div class="row" style="margin-top: 20px;">
            <table id="tbCategory" class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th class="Actions" colspan="2">Actions</th>
                        <th style="display:none">ID</th>
                        <th>Code</th>
                        <th>Name</th>
                        <th>IsView?</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($blogCategories as $blogCategory)
                        <tr>
                            <td class="buttonAction">
                                <input type="button" class="btn btn-link btnEdit" Value="Edit" >
                            </td>
                            <td class="buttonAction">
                                {{-- <a href="{{ URL::to('/BlogCategory/destroy', ['blogcategory' => $blogCategory->id]) }}" class="btn btn-link">Delete</a> --}}
                                {{-- <form action="{{ action('AdminPage\BlogCategoryController@destroy', ['blogcategory' => $blogCategory->id]) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <input type="submit" class="btn btn-link" Value="Delete">
                                </form> --}}
                                <input type="button" class="btn btn-link btnDelete" Value="Delete" data-code="{{$blogCategory->id}}">
                            </td>
                            <td class="eachRow" style="display:none">{{$blogCategory->id}}</td>
                            <td class="eachRow">{{$blogCategory->categoryCode}}</td>
                            <td class="eachRow">{{$blogCategory->categoryName}}</td>
                            <td class="eachRow">{{$blogCategory->isView >= 1 ? "True" : "False"}}</td>
                        </tr>
                        @empty
                    @endforelse
                </tbody>
            </table>
        </div>
        @include('adminpage.blogcategorycreate')
        @include('adminpage.blogcategoryedit')
        @include('commoncomponent.loading')
        {{ ( $blogCategories->links()) }}
    </div>
@endsection

@section('javascript')
    <script type="text/javascript">
        $(document).ready(function () {
            var tableclicked = null;
            /*********************************
            *       Create Blog Category
            **********************************/
            $('#btnCreate').click(function(e){
                // $("#loadMe").modal({
                //     backdrop: "static", //remove ability to close modal with click
                //     keyboard: false, //remove option to close with keyboard
                //     show: true //Display loader!
                // });

                // $.ajax({
                //     method: 'get',
                //     url: "/showtest",
                //     success: function(data){
                //         console.log(data);
                //     }
                // });
                var isView = $('#createIsView').prop("Checked") == true ? 1 : 0;
                $('#btnCreate').attr('disabled', true);
                $('#btnCancelCreate').attr('disabled', true);
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: "{{ route('blogcategory.store') }}",
                    data: {
                        'categoryCode': $('#createCategoryCode').val(),
                        'categoryName': $('#createCategoryName').val(),
                        'isView': isView,
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    // beforeSend: function() {
                    //     $.LoadingOverlay('show');
                    // },
                    success: function(data){
                        // $.LoadingOverlay('hide');
                        // $("#loadMe").modal("hide");
                        $('#ModalCreate').modal('hide');
                        window.location = "{{ route('blogcategory.index') }}";
                    },
                    error: function(data){
                        $("#loadMe").modal("hide");
                        console.log(data);
                    }
                });
            }); 
            /*********************************
            *       Delete Blog Category
            **********************************/
            $(document).on('click', '#tbCategory .btnDelete', function(e){
                // $("#loadMe").modal({
                //     backdrop: "static", //remove ability to close modal with click
                //     keyboard: false, //remove option to close with keyboard
                //     show: true //Display loader!
                // });

                var code = $(this).attr('data-code');
                console.log(code);
                // OR
                var tr = $(this).closest('tr');
                e.preventDefault();
                $.ajax({
                    type: 'DELETE',
                    url: "/blogcategory/destory/" + tr.find('td:eq(2)').html(),
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    // beforeSend: function() {
                    //     $.LoadingOverlay('show');
                    // },
                    success: function(data){
                        // $.LoadingOverlay('hide');

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
                // $("#loadMe").modal({
                //     backdrop: "static", //remove ability to close modal with click
                //     keyboard: false, //remove option to close with keyboard
                //     show: true //Display loader!
                // });
                tableclicked = $(this);
                var tr = $(this).closest('tr');
                var code = tr.find('td:eq(2)').html();
                e.preventDefault();
                $.ajax({
                    type: 'GET',
                    url: "/blogcategory/edit/" + tr.find('td:eq(2)').html(),
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    // beforeSend: function() {
                    //     $.LoadingOverlay('show');
                    // },
                    success: function(data){
                        // $.LoadingOverlay('hide');

                        $('#ModalEdit').modal('show');

                        $("#editCategoryId").val(data && data.id ? data.id :"Auto Generate");
                        $("#editCategoryName").val(data && data.categoryName ? data.categoryName :"");
                        $("#editCategoryCode").val(data && data.categoryCode ? data.categoryCode :"");
                        data && data.isView 
                        ? data.isView == 1 
                            ? $("#editIsView").attr('checked', true) 
                            : $("#editIsView").attr('checked', false) 
                        : $("#editIsView").attr('checked', false);
                        
                        console.log(data);
                    },
                    error: function(data){
                        $("#loadMe").modal("hide");
                        console.log(data);
                    }
                });
            }); 
            /*********************************
            *       Update Blog Category
            **********************************/
            $(document).on('click', '#btnUpdate', function(e){
                // $("#loadMe").modal({
                //     backdrop: "static", //remove ability to close modal with click
                //     keyboard: false, //remove option to close with keyboard
                //     show: true //Display loader!
                // });
                
                var isView = $('#editIsView').prop("checked") == true ? 1 : 0;
                $('#btnUpdate').attr('disabled', true);
                $('#btnCancelCreate').attr('disabled', true);
                e.preventDefault();
                $.ajax({
                    type: 'PUT',
                    url: "/blogcategory/update/" + $('#editCategoryId').val(),
                    dataType: 'json',
                    data: {
                            'categoryCode': $('#editCategoryCode').val(),
                            'categoryName': $('#editCategoryName').val(),
                            'isView': isView,
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    // beforeSend: function() {
                    //     $.LoadingOverlay('show');
                    // },
                    success: function(data){
                        // $.LoadingOverlay('hide');
                        $('#ModalEdit').modal('hide');
                        $('#btnUpdate').attr('disabled', false);
                        $('#btnCancelCreate').attr('disabled', false);

                        //---Update Table
                        if(tableclicked !== null && data !== null){
                            var tr = tableclicked.closest('tr');
                            tr.find('td:eq(2)').html(data.id);
                            tr.find('td:eq(3)').html(data.categoryCode ? data.categoryCode : "");
                            tr.find('td:eq(4)').html(data.categoryName ? data.categoryName : "");
                            data.isView 
                            ? data.isView == 1 
                                ? tr.find('td:eq(5)').html("True")
                                : tr.find('td:eq(5)').html("False")
                            : tr.find('td:eq(5)').html("False");
                        }else{
                            window.location = "{{ route('blogcategory.index') }}";
                        }
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

