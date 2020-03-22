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
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row label">
            <div class="col-xl-10"></div>
            <div class="col-xl-2" style="background-color: #ff8b77; 
                                        padding-left:0">
                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-10" style="background-color: #fce5ff; 
                                            text-align: center">
                        <h5 style="color: #b91e1a">Blog</h5>
                    </div>
                    <div class="col-1"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2">
                <!-- Trigger the modal with a button -->
                <a href="/blog/create" class="btn btn-primary" style="width: 100%"> Add New</a>
                <!-- <input type="button" class="btn btn-primary" Value="Add New" style="width: 100%"  data-toggle="modal" id="btnCreate"> -->
            </div>
        </div>
        <div class="row" style="margin-top: 20px;">
            <table id="tbCategory" class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>BlogCode</th>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Comment</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="buttonAction">
                                <input type="button" class="btn btn-link btnEdit" Value="Edit" >
                            </td>
                            <td class="buttonAction">
                                
                                
                                <input type="button" class="btn btn-link btnDelete" Value="Delete" data-code="<?php echo e($blog->id); ?>">
                            </td>
                            <td class="eachRow"><?php echo e($blog->id); ?></td>
                            <td class="eachRow"><?php echo e($blog->blogCode); ?></td>
                            <td class="eachRow"><?php echo e($blog->title); ?></td>
                            <td class="eachRow"><?php echo e($blog->content); ?></td>
                            <td class="eachRow"><?php echo e($blog->comment); ?></td>
                            <td class="eachRow"><?php echo e($blog->isApproved); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
        
        <?php echo $__env->make('commoncomponent.loading', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo e(( $blogs->links())); ?>

    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
    <script type="text/javascript">
        $(document).ready(function () {
            var tableclicked = null;
            /*********************************
            *       Delete Blog Category
            **********************************/
            $(document).on('click', '#tbCategory .btnDelete', function(e){

                var code = $(this).attr('data-code');
                console.log(code);
                // OR
                var tr = $(this).closest('tr');
                e.preventDefault();
                $.ajax({
                    type: 'DELETE',
                    url: "/blog/destory" + tr.find('td:eq(2)').html(),
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data){
                        tr.find('td').remove();
                    },
                    error: function(data){
                        $("#loadMe").modal("hide");
                        console.log(data);
                    }
                });
            }); 
            /*********************************
            *       Edit Blog Category
            **********************************/
            $(document).on('click', '#tbCategory .btnEdit', function(e){
                tableclicked = $(this);
                var tr = $(this).closest('tr');
                var code = tr.find('td:eq(2)').html();
                e.preventDefault();
                $.ajax({
                    type: 'GET',
                    url: "/blog/edit/" + tr.find('td:eq(2)').html(),
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data){
                        // $("#editCategoryId").val(data && data.id ? data.id :"Auto Generate");
                        // $("#editCategoryName").val(data && data.categoryName ? data.categoryName :"");
                        // $("#editCategoryCode").val(data && data.categoryCode ? data.categoryCode :"");
                        // data && data.isView 
                        // ? data.isView == 1 
                        //     ? $("#editIsView").attr('checked', true) 
                        //     : $("#editIsView").attr('checked', false) 
                        // : $("#editIsView").attr('checked', false);
                        
                        // console.log(data);
                    },
                    error: function(data){
                        $("#loadMe").modal("hide");
                        console.log(data);
                    }
                });
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.adminpagelayouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\assignment-web-semester-ll\assignment-web-semester-ll\resources\views/adminpage/blog_index.blade.php ENDPATH**/ ?>