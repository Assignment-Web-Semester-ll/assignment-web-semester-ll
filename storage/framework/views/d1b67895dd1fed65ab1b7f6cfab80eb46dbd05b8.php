<?php $__env->startSection('title'); ?>
    Home
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <form action="<?php echo e(route('blogcategory.store')); ?>" method="POST"> 
        <!-- Modal body -->
        <div class="modal-body">
            <div class="row marginBottom">
                <div class="col-xl-4">
                    <label for="usr">ID</label>
                </div>
                <div class="col-xl-8">
                    <input type="text" class="form-control" id="categoryID" name="categoryID" value="Auto Generate" disabled>
                </div>
            </div>
            <div class="row marginBottom">
                <div class="col-xl-4">
                    <label for="usr">Blog Category</label>
                </div>
                <div class="col-xl-8">
                    <input type="text" class="form-control" id="blogCategory" 
                            name="blogCategory" placeholder="មុខម្ហូបខ្មែរ,មុខម្ហូបបរទេស,...">
                </div>
            </div>
            <div class="row marginBottom">
                <div class="col-xl-10">
                    <label for="usr">Do you want this category to view on visitor page?</label>
                </div>
                <div class="col-xl-2">
                    <label class="form-check-label" for="categoryID">
                        <input type="checkbox" class="form-check-input" id="categoryCheckID" name="categoryCheckID" checked>Yes
                    </label>
                </div>
            </div>
        </div>
        <input type="submit" class="btn btn-success" id="submit" name="submit" value="Submit">
        <input type="button" class="btn btn-danger" id="cancel" name="cancel" value="Cancel" data-dismiss="modal">
        
    </form>
<?php $__env->stopSection(); ?>
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


<?php echo $__env->make('layouts.adminpagelayouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Year (Prepare for work)\Laravel\Assignment_Sokim\assignment-web-semester-ll\resources\views/adminpage/newblogcategory.blade.php ENDPATH**/ ?>