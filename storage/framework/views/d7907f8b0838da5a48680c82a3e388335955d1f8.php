<?php $__env->startSection('title'); ?>
    Home
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
            <table id="tbCategory" class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th class="Actions" colspan="2">Actions</th>
                        <th style="display:none">ID</th>
                        <th>Code</th>
                        <th>Name</th>
                        <th>IsView?</th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
        </div>
        <?php echo $__env->make('adminpage.blogcategorycreate', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('adminpage.blogcategoryedit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('commoncomponent.loading', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
    <script type="text/javascript">
        $(document).ready(function () {
            var tableclicked = null;
            /*********************************
            *       Create Blog Category
            **********************************/
            $('#btnCreate').click(function(e){
                // $("#loadMe").modal({
                //     backdrop: "static", //remove ability to close modal with click
                //     keyboard: false, //remove option to close with keyboard
                //     show: true //Display loader!
                // });

                // $.ajax({
                //     method: 'get',
                //     url: "/showtest",
                //     success: function(data){
                //         console.log(data);
                //     }
                // });
                var isView = $('#createIsView').prop("Checked") == true ? 1 : 0;
                $('#btnCreate').attr('disabled', true);
                $('#btnCancelCreate').attr('disabled', true);
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: "<?php echo e(route('blogcategory.store')); ?>",
                    data: {
                        'categoryCode': $('#createCategoryCode').val(),
                        'categoryName': $('#createCategoryName').val(),
                        'isView': isView,
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    // beforeSend: function() {
                    //     $.LoadingOverlay('show');
                    // },
                    success: function(data){
                        // $.LoadingOverlay('hide');
                        // $("#loadMe").modal("hide");
                        $('#ModalCreate').modal('hide');
                        window.location = "<?php echo e(route('blogcategory.index')); ?>";
                    },
                    error: function(data){
                        $("#loadMe").modal("hide");
                        console.log(data);
                    }
                });
            }); 
            /*********************************
            *       Delete Blog Category
            **********************************/
            $(document).on('click', '#tbCategory .btnDelete', function(e){
                // $("#loadMe").modal({
                //     backdrop: "static", //remove ability to close modal with click
                //     keyboard: false, //remove option to close with keyboard
                //     show: true //Display loader!
                // });

                var code = $(this).attr('data-code');
                console.log(code);
                // OR
                var tr = $(this).closest('tr');
                e.preventDefault();
                $.ajax({
                    type: 'DELETE',
                    url: "/blogcategory/destory/" + tr.find('td:eq(2)').html(),
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    // beforeSend: function() {
                    //     $.LoadingOverlay('show');
                    // },
                    success: function(data){
                        // $.LoadingOverlay('hide');

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
                // $("#loadMe").modal({
                //     backdrop: "static", //remove ability to close modal with click
                //     keyboard: false, //remove option to close with keyboard
                //     show: true //Display loader!
                // });
                tableclicked = $(this);
                var tr = $(this).closest('tr');
                var code = tr.find('td:eq(2)').html();
                e.preventDefault();
                $.ajax({
                    type: 'GET',
                    url: "/blogcategory/edit/" + tr.find('td:eq(2)').html(),
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    // beforeSend: function() {
                    //     $.LoadingOverlay('show');
                    // },
                    success: function(data){
                        // $.LoadingOverlay('hide');

                        $('#ModalEdit').modal('show');

                        $("#editCategoryId").val(data && data.id ? data.id :"Auto Generate");
                        $("#editCategoryName").val(data && data.categoryName ? data.categoryName :"");
                        $("#editCategoryCode").val(data && data.categoryCode ? data.categoryCode :"");
                        data && data.isView 
                        ? data.isView == 1 
                            ? $("#editIsView").attr('checked', true) 
                            : $("#editIsView").attr('checked', false) 
                        : $("#editIsView").attr('checked', false);
                        
                        console.log(data);
                    },
                    error: function(data){
                        $("#loadMe").modal("hide");
                        console.log(data);
                    }
                });
            }); 
            /*********************************
            *       Update Blog Category
            **********************************/
            $(document).on('click', '#btnUpdate', function(e){
                // $("#loadMe").modal({
                //     backdrop: "static", //remove ability to close modal with click
                //     keyboard: false, //remove option to close with keyboard
                //     show: true //Display loader!
                // });
                
                var isView = $('#editIsView').prop("checked") == true ? 1 : 0;
                $('#btnUpdate').attr('disabled', true);
                $('#btnCancelCreate').attr('disabled', true);
                e.preventDefault();
                $.ajax({
                    type: 'PUT',
                    url: "/blogcategory/update/" + $('#editCategoryId').val(),
                    dataType: 'json',
                    data: {
                            'categoryCode': $('#editCategoryCode').val(),
                            'categoryName': $('#editCategoryName').val(),
                            'isView': isView,
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    // beforeSend: function() {
                    //     $.LoadingOverlay('show');
                    // },
                    success: function(data){
                        // $.LoadingOverlay('hide');
                        $('#ModalEdit').modal('hide');
                        $('#btnUpdate').attr('disabled', false);
                        $('#btnCancelCreate').attr('disabled', false);

                        //---Update Table
                        if(tableclicked !== null && data !== null){
                            var tr = tableclicked.closest('tr');
                            tr.find('td:eq(2)').html(data.id);
                            tr.find('td:eq(3)').html(data.categoryCode ? data.categoryCode : "");
                            tr.find('td:eq(4)').html(data.categoryName ? data.categoryName : "");
                            data.isView 
                            ? data.isView == 1 
                                ? tr.find('td:eq(5)').html("True")
                                : tr.find('td:eq(5)').html("False")
                            : tr.find('td:eq(5)').html("False");
                        }else{
                            window.location = "<?php echo e(route('blogcategory.index')); ?>";
                        }
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


<?php echo $__env->make('layouts.adminpagelayouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\assignment-web-semester-ll\assignment-web-semester-ll\resources\views/adminpage/blogcategoryindex.blade.php ENDPATH**/ ?>