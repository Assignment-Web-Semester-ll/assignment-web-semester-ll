<!-- The Modal -->
<div class="modal" id="ModalEdit">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
            <h4 class="modal-title">Edit Category</h4>
                <input type="button" class="btn close" data-dismiss="modal" value="&times;">
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="row marginBottom">
                    <div class="col-xl-4">
                        <label>ID</label>
                    </div>
                    <div class="col-xl-8">
                        <input type="text" class="form-control" id="editCategoryId" name="editCategoryId" value="Auto Generate" disabled>
                    </div>
                </div>
                <div class="row marginBottom">
                    <div class="col-xl-4">
                        <label>Category Code</label>
                    </div>
                    <div class="col-xl-8">
                        <input type="text" class="form-control" id="editCategoryCode" name="editCategoryCode" placeholder="CT001">
                    </div>
                </div>
                <div class="row marginBottom">
                    <div class="col-xl-4">
                        <label>Category Name</label>
                    </div>
                    <div class="col-xl-8">
                        <input type="text" class="form-control" id="editCategoryName" name="editCategoryName" placeholder="មុខម្ហូបខ្មែរ,មុខម្ហូបបរទេស,...">
                    </div>
                </div>
                <div class="row marginBottom">
                    <div class="col-xl-10">
                        <label>Do you want this category to view on visitor page?</label>
                    </div>
                    <div class="col-xl-2">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="editIsView" name="editIsView" value="1" checked>Yes
                        </label>
                    </div>
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <input type="button" class="btn btn-success" id="btnUpdate" name="btnUpdate" value="Update">
                <input type="button" class="btn btn-danger" id="btnCancelUpdate" name="btnCancelUpdate" value="Cancel" data-dismiss="modal">
            </div>

        </div>
    </div>
</div>