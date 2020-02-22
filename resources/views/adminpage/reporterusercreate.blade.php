<!-- The Modal -->
<div class="modal" id="ModalCreate">
    <div class="modal-dialog">
    <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
        <h4 class="modal-title">New User</h4>
            <input type="button" class="btn close" data-dismiss="modal" value="&times;">
        </div>

        <!-- Modal body -->
        <div class="modal-body">
            <div class="row marginBottom">
                <div class="col-xl-4">
                    <label>ID</label>
                </div>
                <div class="col-xl-8">
                    <input type="text" class="form-control" id="createUserId" name="createUserId" value="Auto Generate" disabled>
                </div>
            </div>
            <div class="row marginBottom">
                <div class="col-xl-4">
                    <label>Full Name</label>
                </div>
                <div class="col-xl-8">
                    <input type="text" class="form-control" id="createFullName" name="createFullName">
                </div>
            </div>
            <div class="row marginBottom">
                <div class="col-xl-4">
                    <label>Date of Birth</label>
                </div>
                <div class="col-xl-8">
                    <input type="date" class="form-control" id="createDateofBirth" name="createDateofBirth">
                </div>
            </div>
            <div class="row marginBottom">
                <div class="col-xl-4">
                    <label>UserName</label>
                </div>
                <div class="col-xl-8">
                    <input type="text" class="form-control" id="createUserName" name="createUserName">
                </div>
            </div>
            <div class="row marginBottom">
                <div class="col-xl-4">
                    <label>Password</label>
                </div>
                <div class="col-xl-8">
                    <input type="password" class="form-control" id="createPassword" name="createPassword">
                </div>
            </div>
            <div class="row marginBottom">
                <div class="col-xl-4">
                    <label>Confirm Password</label>
                </div>
                <div class="col-xl-8">
                    <input type="password" class="form-control" id="createConfirmPassword" name="createConfirmPassword">
                </div>
            </div>
            <div class="row marginBottom">
                <div class="col-xl-4">
                    <label>Is Admin?</label>
                </div>
                <div class="col-xl-8">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" id="createIsAdmin" name="createIsAdmin" value="1" checked>Yes
                    </label>
                </div>
            </div>


            {{-- @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
            </div>
            <img src="images/{{ Session::get('image') }}">
            @endif
    
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif --}}
    
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
            <input type="button" class="btn btn-success" id="btnCreateUser" name="btnCreateUser" value="Submit">
            <input type="button" class="btn btn-danger" id="btnCancelCreate" name="btnCancelCreate" value="Cancel" data-dismiss="modal">
        </div>

    </div>
    </div>
</div>


@section('javascript')
    <script type="text/javascript">
        $(document).ready(function () {
            var tableclicked = null;
            $(document).on('click', '#btnCreateUser', function(e){

                var fullname = $("#createFullName").val();
                var dob = $("#createDateofBirth").val();
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
                        console.log("SUCCESS : ", data);
                    },
                    error: function (e) {
                        console.log("ERROR : ", e);

                    }
                });
            });
        });
    </script>
@stop