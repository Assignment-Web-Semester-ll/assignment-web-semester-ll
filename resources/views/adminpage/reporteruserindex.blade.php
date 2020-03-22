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
            <table id="tbUser" class="table table-hover table-bordered">
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
                            <td class="eachRow">{{ $reporterUser->isAdmin  ? 'Checked' : '' }}</td>
                        </tr>
                        @empty
                    @endforelse
                </tbody>
            </table>
        </div>
        @include('adminpage.reporterusercreate')
        @include('adminpage.reporteruseredit')
        @include('adminpage.reporteruserview')
        @include('commoncomponent.loading')
        {{ ( $reporterUsers->links()) }}
    </div>
@endsection

@section('javascript')
    <script type="text/javascript">
        $(document).ready(function () {
            var tableclicked = null;
            /*********************************
            *       1. Create Blog Category
            **********************************/
            $(document).on('click', '#btnCreateUser', function(e){
                // $("#loadMe").modal({
                //     backdrop: "static", //remove ability to close modal with click
                //     keyboard: false, //remove option to close with keyboard
                //     show: true //Display loader!
                // });

                var fullname = $("#createFullName").val();
                var dob = $("#createDateofBirth").val();
                var email = $("#createEmail").val();
                var username = $("#createUserName").val();
                var password = $("#createPassword").val();
                var confirmPassword = $("#createConfirmPassword").val();
                var isAdmin = $('#createIsAdmin').prop("Checked") == true ? true : false;

                if(!password && !confirmPassword && !(password == confirmPassword)){
                    console.log("Incorrect");
                    return;
                }

                console.log(isAdmin);

                //stop submit the form, we will post it manually.
                event.preventDefault();
                console.log("Invoked");
                // Get form
                var form = $('#fileUploadForm')[0];

                // Create an FormData object 
                var data = new FormData(form);

                // If you want to add an extra field for the FormData
                data.append("createFullName", fullname);
                data.append("createDateofBirth", dob);
                data.append("createEmail", email);
                data.append("createUserName", username);
                data.append("createPassword", password);
                data.append("createIsAdmin", isAdmin);

                $.ajax({
                    type: "POST",
                    enctype: 'multipart/form-data',
                    url: "{{ route('reporteruser.store') }}",
                    data: data,
                    processData: false,
                    contentType: false,
                    cache: false,
                    timeout: 600000,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (data) {
                        // $("#loadMe").modal("hide");
                        $('#ModalCreate').modal('hide');

                        console.log("SUCCESS : ", data);
                        window.location = "{{ route('reporteruser.index') }}";
                    },
                    error: function (e) {
                        $("#loadMe").modal("hide");
                        console.log("ERROR : ", e);

                    }
                });
            });
            /*********************************
            *       2. Delete Reporter User
            **********************************/
            $(document).on('click', '#tbUser .btnDelete', function(e){
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
                    url: "/reporteruser/destory/" + tr.find('td:eq(3)').html(),
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data){
                        // $("#loadMe").modal("hide");

                        tr.find('td').remove();
                    },
                    error: function(data){
                        $("#loadMe").modal("hide");
                        console.log(data);
                    }
                });
            }); 

            /*********************************
            *       3. Edit Reporter User
            **********************************/
            $(document).on('click', '#tbUser .btnEdit', function(e){
                // $("#loadMe").modal({
                //     backdrop: "static", //remove ability to close modal with click
                //     keyboard: false, //remove option to close with keyboard
                //     show: true //Display loader!
                // });
                tableclicked = $(this);

                var tr = $(this).closest('tr');
                var code = tr.find('td:eq(3)').html();
                console.log(code);

                e.preventDefault();
                $.ajax({
                    type: 'GET',
                    url: "/reporteruser/edit/" + code,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data){
                        // $("#loadMe").modal("hide");

                        $('#ModalEdit').modal('show');

                        $("#editUserId").val(data && data.id ? data.id :"Auto Generate");
                        $("#editFullName").val(data && data.fullname ? data.fullname :"");
                        $("#editUserName").val(data && data.username ? data.username :"");
                        $("#editPassword").val(data && data.password ? data.password :"");
                        $("#editConfirmPassword").val(data && data.password ? data.password :"");
                        $("#editEmail").val(data && data.email ? data.email :"");

                        var now = new Date(data.dob);
                        var day = ("0" + now.getDate()).slice(-2);
                        var month = ("0" + (now.getMonth() + 1)).slice(-2);

                        var today = now.getFullYear()+"-"+(month)+"-"+(day) ;

                        $("#editDateofBirth").val(data && data.dob ? today :"");

                        data && data.isAdmin 
                        ? data.isAdmin == 1 
                            ? $("#editIsAdmin").attr('checked', true) 
                            : $("#editIsAdmin").attr('checked', false) 
                        : $("#editIsAdmin").attr('checked', false);

                        if(data && data.profilePhoto){
                            $("#editUserPhoto").attr("src", "images/"+data.profilePhoto);
                        }
                        console.log(data);
                    },
                    error: function(data){
                        $("#loadMe").modal("hide");
                        console.log(data);
                    }
                });
            }); 
             /*********************************
            *       4. Update Reporter User
            **********************************/
            $(document).on('click', '#btnUpdateUser', function(e){
                // $("#loadMe").modal({
                //     backdrop: "static", //remove ability to close modal with click
                //     keyboard: false, //remove option to close with keyboard
                //     show: true //Display loader!
                // });

                var id = $("#editUserId").val();
                var fullname = $("#editFullName").val();
                var dob = $("#editDateofBirth").val();
                var email = $("#editEmail").val();
                var username = $("#editUserName").val();
                var password = $("#editPassword").val();
                var confirmPassword = $("#editConfirmPassword").val();
                var isAdmin = $('#editIsAdmin').prop("checked") == 1 ? true : false;

                if(!password && !confirmPassword && !(password == confirmPassword)){
                    console.log("Incorrect");
                    return;
                }

                $('#btnUpdateUser').attr('disabled', true);
                $('#btnCancelUpdate').attr('disabled', true);

                //stop submit the form, we will post it manually.
                event.preventDefault();
                // Get form
                var form = $('#fileUploadFormEdit')[0];

                // Create an FormData object 
                var data = new FormData(form);

                // If you want to add an extra field for the FormData
                data.append("createFullName", fullname);
                data.append("createDateofBirth", dob);
                data.append("createEmail", email);
                data.append("createUserName", username);
                data.append("createPassword", password);
                data.append("createIsAdmin", isAdmin);

                $.ajax({
                    type: 'POST',
                    enctype: 'multipart/form-data',
                    url: "/reporteruser/update/" + id,
                    data: data,
                    processData: false,
                    contentType: false,
                    cache: false,
                    timeout: 600000,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data){
                        // $("#loadMe").modal("hide");
                        $('#ModalEdit').modal('hide');
                        $('#btnUpdateUser').attr('disabled', false);
                        $('#btnCancelUpdate').attr('disabled', false);

                        //---Update Table
                        if(tableclicked !== null && data !== null){
                            var tr = tableclicked.closest('tr');
                            tr.find('td:eq(3)').html(data.id);
                            tr.find('td:eq(4)').html(data.fullname ? data.fullname : "");
                            tr.find('td:eq(5)').html(data.username ? data.username : "");
                            tr.find('td:eq(6)').html(data.email ? data.email : "");

                            data.isAdmin 
                            ? data.isAdmin == true
                                ? tr.find('td:eq(7)').html("True")
                                : tr.find('td:eq(7)').html("False")
                            : tr.find('td:eq(7)').html("False");

                        }else{
                            window.location = "{{ route('blogcategory.index') }}";
                        }

                        console.log("SUCCESS : ", data);
                    },
                    error: function(data){
                        $("#loadMe").modal("hide");
                        console.log("ERROR : ", e);
                    }
                });
            });
            /*********************************
            *       5. View Reporter User
            **********************************/
            $(document).on('click', '#tbUser .btnView', function(e){
                // $("#loadMe").modal({
                //     backdrop: "static", //remove ability to close modal with click
                //     keyboard: false, //remove option to close with keyboard
                //     show: true //Display loader!
                // });

                var tr = $(this).closest('tr');
                var code = tr.find('td:eq(3)').html();
                console.log(code);

                e.preventDefault();
                $.ajax({
                    type: 'GET',
                    url: "/reporteruser/show/" + code,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data){
                        // $("#loadMe").modal("hide");

                        $('#ModalView').modal('show');

                        $("#viewUserId").val(data && data.id ? data.id :"Auto Generate");
                        $("#viewFullName").val(data && data.fullname ? data.fullname :"");
                        $("#viewUserName").val(data && data.username ? data.username :"");
                        $("#viewPassword").val(data && data.password ? data.password :"");
                        $("#viewConfirmPassword").val(data && data.password ? data.password :"");
                        $("#viewEmail").val(data && data.email ? data.email :"");

                        var now = new Date(data.dob);
                        var day = ("0" + now.getDate()).slice(-2);
                        var month = ("0" + (now.getMonth() + 1)).slice(-2);

                        var today = now.getFullYear()+"-"+(month)+"-"+(day) ;

                        $("#viewDateofBirth").val(data && data.dob ? today :"");

                        data && data.isAdmin 
                        ? data.isAdmin == 1 
                            ? $("#viewIsAdmin").attr('checked', true) 
                            : $("#viewIsAdmin").attr('checked', false) 
                        : $("#viewIsAdmin").attr('checked', false);

                        if(data && data.profilePhoto){
                            $("#viewUserPhoto").attr("src", "images/"+data.profilePhoto);
                        }
                        console.log(data);
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





