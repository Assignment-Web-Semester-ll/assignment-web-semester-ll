<!-- The Modal -->
<div class="modal" id="ModalCreate">
    <div class="modal-dialog">
    <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
        <h4 class="modal-title">Add New Category</h4>
            <input type="button" class="btn close" data-dismiss="modal" value="&times;">
        </div>

        <!-- Modal body -->
        <div class="modal-body">
            <div class="row marginBottom">
                <div class="col-xl-4">
                    <label>ID</label>
                </div>
                <div class="col-xl-8">
                    <input type="text" class="form-control" id="createCategoryId" name="createCategoryId" value="Auto Generate" disabled>
                </div>
            </div>
            <div class="row marginBottom">
                <div class="col-xl-4">
                    <label>Category Code</label>
                </div>
                <div class="col-xl-8">
                    <input type="text" class="form-control" id="createCategoryCode" name="createCategoryCode" placeholder="CT001">
                </div>
            </div>
            <div class="row marginBottom">
                <div class="col-xl-4">
                    <label>Category Name</label>
                </div>
                <div class="col-xl-8">
                    <input type="text" class="form-control" id="createCategoryName" name="createCategoryName" placeholder="មុខម្ហូបខ្មែរ,មុខម្ហូបបរទេស,...">
                </div>
            </div>
            <div class="row marginBottom">
                <div class="col-xl-10">
                    <label>Do you want this category to view on visitor page?</label>
                </div>
                <div class="col-xl-2">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" id="createIsView" name="createIsView" value="1" checked>Yes
                    </label>
                </div>
            </div>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
            <input type="button" class="btn btn-success" id="btnCreate" name="btnCreate" value="Submit">
            <input type="button" class="btn btn-danger" id="btnCancelCreate" name="btnCancelCreate" value="Cancel" data-dismiss="modal">
            {{-- <a href="{{ URL::to('/BlogCategory/destroy', ['blogcategory' => $blogCategory->id]) }}" class="btn btn-link">Delete</a> --}}
            {{-- <a href="{{action('BlogCategoryController@myindex')}}" role="button" class="btn btn-danger" id="cancel" name="cancel" value="Cancel">Cancel</a> --}}
        </div>

    </div>
    </div>
</div>