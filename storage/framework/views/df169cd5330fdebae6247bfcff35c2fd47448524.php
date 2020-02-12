<!-- The Modal -->
<div class="modal" id="ModelEdit">
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
                    <label for="usr">ID</label>
                </div>
                <div class="col-xl-8">
                    <input type="text" class="form-control" id="id" name="id" value="<?php echo e($blogcategory->id ?? "Auto Generate"); ?>" disabled>
                </div>
            </div>
            <div class="row marginBottom">
                <div class="col-xl-4">
                    <label for="usr">Blog Category</label>
                </div>
                <div class="col-xl-8">
                    <input type="text" class="form-control" id="blogCategory" name="blogCategory" placeholder="មុខម្ហូបខ្មែរ,មុខម្ហូបបរទេស,...">
                </div>
            </div>
            <div class="row marginBottom">
                <div class="col-xl-10">
                    <label for="usr">Do you want this category to view on visitor page?</label>
                </div>
                <div class="col-xl-2">
                    <label class="form-check-label" for="categoryID">
                        <input type="checkbox" class="form-check-input" id="isView" name="isView" value="1" checked>Yes
                    </label>
                </div>
            </div>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
            
            <input type="button" class="btn btn-danger" id="cancel" name="cancel" value="Cancel" data-dismiss="modal">
            
        </div>

    </div>
    </div>
</div><?php /**PATH D:\Year (Prepare for work)\Laravel\Assignment_Sokim\assignment-web-semester-ll\resources\views/adminpage/blogcategoryedit.blade.php ENDPATH**/ ?>