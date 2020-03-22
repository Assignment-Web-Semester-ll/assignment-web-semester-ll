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
                    <form method="POST" enctype="multipart/form-data" id="fileUploadFormEdit">
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
</div><?php /**PATH C:\xampp\htdocs\assignment-web-semester-ll\assignment-web-semester-ll\resources\views/adminpage/reporteruseredit.blade.php ENDPATH**/ ?>