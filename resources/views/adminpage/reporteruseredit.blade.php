<!-- The Modal -->
<div class="modal" id="ModalEdit">
    <div class="modal-dialog">
    <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
        <h4 class="modal-title">Edit User</h4>
            <input type="button" class="btn close" data-dismiss="modal" value="&times;">
        </div>

        <!-- Modal body -->
        <div class="modal-body">
            <div class="row marginBottom">
                <div class="col-xl-4">
                    <label>ID</label>
                </div>
                <div class="col-xl-8">
                    <input type="text" class="form-control" id="editUserId" name="editUserId" value="Auto Generate" disabled>
                </div>
            </div>
            <div class="row marginBottom">
                <div class="col-xl-4">
                    <label>Full Name</label>
                </div>
                <div class="col-xl-8">
                    <input type="text" class="form-control" id="editFullName" name="editFullName">
                </div>
            </div>
            <div class="row marginBottom">
                <div class="col-xl-4">
                    <label>Date of Birth</label>
                </div>
                <div class="col-xl-8">
                    <input type="date" class="form-control" id="editDateofBirth" name="editDateofBirth">
                </div>
            </div>
            <div class="row marginBottom">
                <div class="col-xl-4">
                    <label>Email</label>
                </div>
                <div class="col-xl-8">
                    <input type="email" class="form-control" id="editEmail" name="editEmail">
                </div>
            </div>
            <div class="row marginBottom">
                <div class="col-xl-4">
                    <label>UserName</label>
                </div>
                <div class="col-xl-8">
                    <input type="text" class="form-control" id="editUserName" name="editUserName">
                </div>
            </div>
            <div class="row marginBottom">
                <div class="col-xl-4">
                    <label>Password</label>
                </div>
                <div class="col-xl-8">
                    <input type="password" class="form-control" id="editPassword" name="editPassword">
                </div>
            </div>
            <div class="row marginBottom">
                <div class="col-xl-4">
                    <label>Confirm Password</label>
                </div>
                <div class="col-xl-8">
                    <input type="password" class="form-control" id="editConfirmPassword" name="editConfirmPassword">
                </div>
            </div>
            <div class="row marginBottom">
                <div class="col-xl-5">
                    <label>Is Admin?</label>
                </div>
                <div class="col-xl-7">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" id="editIsAdmin" name="editIsAdmin" value="1" checked>Yes
                    </label>
                </div>
            </div>

            <div class="row marginBottom">
                <div class="col-xl-4">
                </div>
                <div class="col-xl-8">
                    <img id="editUserPhoto" name="editUserPhoto" style="width: 100px; height: auto;">
                </div>
            </div>

            <div class="row marginBottom">
                <div class="col-xl-4">
                    <label>Photo</label>
                </div>
                <div class="col-xl-8">
                    <form method="POST" enctype="multipart/form-data" id="fileUploadForm">
                        <input type="file" name="image" class="form-control">
                    </form>
                </div>
            </div>

        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
            <input type="button" class="btn btn-success" id="btnUpdateUser" name="btnUpdateUser" value="Update">
            <input type="button" class="btn btn-danger" id="btnCancelUpdate" name="btnCancelUpdate" value="Cancel" data-dismiss="modal">
        </div>

    </div>
    </div>
</div>

@section('javascript')
    <script type="text/javascript">
        $(document).ready(function () {
            var tableclicked = null;
            /*********************************
            *       Create Blog Category
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
                        $("#loadMe").modal("hide");
                        console.log("SUCCESS : ", data);
                    },
                    error: function (e) {
                        $("#loadMe").modal("hide");
                        console.log("ERROR : ", e);

                    }
                });
            });
            /*********************************
            *       Delete Reporter User
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
                        $("#loadMe").modal("hide");

                        tr.find('td').remove();
                    },
                    error: function(data){
                        $("#loadMe").modal("hide");
                        console.log(data);
                    }
                });
            }); 

            /*********************************
            *       Edit Reporter User
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
                        $("#loadMe").modal("hide");

                        $('#ModalEdit').modal('show');

                        $("#editUserId").val(data && data.id ? data.id :"Auto Generate");
                        $("#editFullName").val(data && data.fullname ? data.fullname :"");
                        $("#editUserName").val(data && data.username ? data.username :"");
                        $("#editPassword").val(data && data.password ? data.password :"");
                        $("#editConfirmPassword").val(data && data.password ? data.password :"");
                        $("#editEmail").val(data && data.email ? data.email :"");
                        $("#editDateofBirth").val(data && data.dob ? data.dob :"");
                        data && data.isAdmin 
                        ? data.isAdmin == 1 
                            ? $("#editIsAdmin").attr('checked', true) 
                            : $("#editIsAdmin").attr('checked', false) 
                        : $("#editIsAdmin").attr('checked', false);

                        $("#editUserPhoto").attr("src", "images/"+data.profilePhoto);
                        console.log(data);
                    },
                    error: function(data){
                        $("#loadMe").modal("hide");
                        console.log(data);
                    }
                });
            }); 
             /*********************************
            *       Update Reporter User
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
                var isAdmin = $('#editIsAdmin').prop("Checked") == true ? true : false;

                if(!password && !confirmPassword && !(password == confirmPassword)){
                    console.log("Incorrect");
                    return;
                }

                $('#btnUpdateUser').attr('disabled', true);
                $('#btnCancelUpdate').attr('disabled', true);

                //stop submit the form, we will post it manually.
                event.preventDefault();
                // Get form
                var form = $('#fileUploadForm')[0];

                // Create an FormData object 
                var data = new FormData(form);

                // If you want to add an extra field for the FormData
                data.append("createFullName", fullname);
                // data.append("createDateofBirth", dob);
                // data.append("createEmail", email);
                // data.append("createUserName", username);
                // data.append("createPassword", password);
                // data.append("createIsAdmin", isAdmin);

                $.ajax({
                    type: 'PUT',
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
                    success: function (data) {
                        $("#loadMe").modal("hide");
                        console.log("SUCCESS : ", data);
                    },
                    error: function (e) {
                        $("#loadMe").modal("hide");
                        console.log("ERROR : ", e);

                    }
                    // success: function(data){
                    //     $("#loadMe").modal("hide");
                    //     $('#ModalEdit').modal('hide');
                    //     $('#btnUpdate').attr('disabled', false);
                    //     $('#btnCancelCreate').attr('disabled', false);

                    //     // //---Update Table
                    //     // if(tableclicked !== null && data !== null){
                    //     //     var tr = tableclicked.closest('tr');
                    //     //     tr.find('td:eq(2)').html(data.id);
                    //     //     tr.find('td:eq(3)').html(data.categoryCode ? data.categoryCode : "");
                    //     //     tr.find('td:eq(4)').html(data.categoryName ? data.categoryName : "");
                    //     //     data.isView 
                    //     //     ? data.isView == 1 
                    //     //         ? tr.find('td:eq(5)').html("True")
                    //     //         : tr.find('td:eq(5)').html("False")
                    //     //     : tr.find('td:eq(5)').html("False");
                    //     // }else{
                    //     //     window.location = "{{ route('blogcategory.index') }}";
                    //     // }
                    // },
                    // error: function(data){
                    //     $("#loadMe").modal("hide");
                    //     console.log(data);
                    // }
                });
            });
        });
    </script>
@stop