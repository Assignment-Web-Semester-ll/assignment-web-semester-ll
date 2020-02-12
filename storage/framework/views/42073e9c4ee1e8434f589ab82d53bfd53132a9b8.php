<?php $__env->startSection('title'); ?>
    Home
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <form action="<?php echo e(route('blogcategory.store')); ?>" method="POST"> 
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
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th class="Actions" colspan="2">Actions</th>
                            <th>ID</th>
                            <th>BlogCategory</th>
                            <th>IsView?</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $blogCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blogCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td class="buttonAction"><input type="button" class="btn btn-link" Value="Edit" ></td>
                                <td class="buttonAction">
                                    <a href="<?php echo e(URL::to('/BlogCategory/destroy', ['blogcategory' => $blogCategory->id])); ?>" class="btn btn-link">Delete</a>
                                    
                                </td>
                                <td class="eachRow"><?php echo e($blogCategory->id); ?></td>
                                <td class="eachRow"><?php echo e($blogCategory->blogCategory); ?></td>
                                <td class="eachRow"><?php echo e($blogCategory->isView >= 1 ? "True" : "False"); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <?php echo $__env->make('adminpage.blogcategorycreate', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            
            
        </div>
        <?php echo csrf_field(); ?>
    </form>
    <?php echo e(( $blogCategories->links())); ?>

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


<?php echo $__env->make('layouts.adminpagelayouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Year (Prepare for work)\Laravel\Assignment_Sokim\assignment-web-semester-ll\resources\views/adminpage/blogcategoryindex.blade.php ENDPATH**/ ?>