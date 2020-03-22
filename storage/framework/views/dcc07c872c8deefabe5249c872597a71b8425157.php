<?php $__env->startSection('title'); ?>
    Blog
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
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
        .box{
            border-style: solid; 
            border-color: #A9A9A9; 
            border-width: 1.5px; 
            border-radius: 3px;
            margin-bottom: 10px;
        }
        .boxTitle{
            background-color: #D8D8D8; 
            padding-bottom: 10px; 
            padding-top: 10px;

            border: 0px;
            border-style: solid; 
            border-bottom-color: #A9A9A9;
            border-bottom-width: 0.5px; 
        }
        .boxTitle h5{
            margin: 0px;
        }
        .boxContent{
            background-color: #F7F7F7; 
            padding-bottom: 10px; 
            padding-top: 10px;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="col-xl-12">
        <div class="row">
            <div class="col-xl-9">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="row label">
                            <div class="col-xl-9"></div>
                            <div class="row col-xl-3" style="background-color: #ff8b77; padding-left:0">
                                <div class="col-xl-1"></div>
                                <div class="col-xl-10" style="background-color: #fce5ff; 
                                                            text-align: center">
                                    <h5 style="color: #b91e1a">Blog</h5>
                                </div>
                                <div class="col-xl-1"></div>
                            </div>
                        </div>

                        <div class="row label">
                            <div class="col-xl-12">
                                <input type="text" class="form-control" id="blogTitle" name="blogTitle" class="form-control" placeholder="Blog's Title Place Here">
                            </div>
                        </div>
    
                        <textarea id="summernote"></textarea>
                    </div>
                </div>
            </div>
            <div class="col-xl-3">
                <div class="row box">
                    <div class="col-xl-12">
                        <div class="row">
                            <div class="col-xl-12 boxTitle">
                                <h5>Publish</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 boxContent">
                                <div class="row">
                                    <div class="col-xl-3">
                                        <label>Code:</label>
                                    </div>
                                    <div class="col-xl-9">
                                        <input type="text" class="form-control" id="blogCode" name="blogCode">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-3">
                                        <label>Status:</label>
                                    </div>
                                    <div class="col-xl-9">
                                        <label>Draft</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-3">
                                        <label>Visibility:</label>
                                    </div>
                                    <div class="col-xl-9">
                                        <select id="visibility" name="visibility">
                                            <option value="1" selected>Show</option>
                                            <option value="0">Hide</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row" style="margin-bottom: 10px;">
                                    <div class="col-xl-5">
                                        <input type="button" class="btn btn-primary" value="Publish" style="width: 100%">
                                    </div>
                                    <div class="col-xl-2"></div>
                                    <div class="col-xl-5">
                                        <input type="button" class="btn btn-danger" value="Delete" style="width: 100%;">
                                    </div>
                                    
                                </div>
                                <div class="row">
                                    <div class="col-xl-12">
                                        <input type="button" id="btnSave" name="btnSave" class="btn btn-success" value="Save" style="width: 100%">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row box">
                    <div class="col-xl-12">
                        <div class="row">
                            <div class="col-xl-12 boxTitle">
                                <h5>Category</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 boxContent" style="max-height: 150px; overflow-y: scroll;">
                                <fieldset>
                                    <?php $__currentLoopData = $blogCategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                        <div class="row">
                                            <div class="col-xl-12 blogCategoryRadio">
                                                <input type="radio" value="<?php echo e($key); ?>" id="<?php echo e($key); ?>" name="blogCategory"> <?php echo e($value); ?>

                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row box">
                    <div class="col-xl-12">
                        <div class="row">
                            <div class="col-xl-12 boxTitle">
                                <h5>Feature Image</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 boxContent" style="max-height: 150px; overflow-y: scroll;">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <form method="POST" enctype="multipart/form-data" id="fileUploadForm">
                                            <input type="file" name="image" id="image" class="btn btn-link">
                                        </form>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-12">
                                        <img id="photo" name="photo" style="width: 200px; height: auto;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php echo $__env->make('commoncomponent.loading', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.adminpagelayouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\assignment-web-semester-ll\assignment-web-semester-ll\resources\views/adminpage/blog.blade.php ENDPATH**/ ?>