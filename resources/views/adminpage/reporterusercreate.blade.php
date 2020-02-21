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
                    <label>Birth Of Date</label>
                </div>
                <div class="col-xl-8">
                    <input type="date" class="form-control" id="createBirthOfDate" name="createBirthOfDate">
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
        </div>
        <input type="file" name="txt_file">
        <!-- Modal footer -->
        <div class="modal-footer">
            <input type="button" class="btn btn-success" id="btnCreateUser" name="btnCreateUser" value="Submit">
            <input type="button" class="btn btn-danger" id="btnCancelCreate" name="btnCancelCreate" value="Cancel" data-dismiss="modal">
        </div>

    </div>
    </div>
</div>