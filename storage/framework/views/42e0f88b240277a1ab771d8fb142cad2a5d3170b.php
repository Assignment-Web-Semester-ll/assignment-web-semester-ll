<?php $__env->startSection('title'); ?>
    All Users
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Register</h4>
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="text-primary">
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>User Type</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($user->id); ?></td>
                                    <td><?php echo e($user->name); ?></td>
                                    <td><?php echo e($user->email); ?></td>
                                    <td><?php echo e($user->usertype); ?></td>
                                    <td>
                                        <a href="/edit-user?name=<?php echo e($user->name); ?>&id=<?php echo e($user->id); ?>" class="btn btn-success btn-circle">Edit</a>
                                    </td>
                                    <td>
                                        <form action="/delete-user?name=<?php echo e($user->name); ?>&id=<?php echo e($user->id); ?>" method="post">
                                            <?php echo e(csrf_field()); ?>

                                            <?php echo e(method_field('DELETE')); ?>

                                            <button type="submit" class="btn btn-danger btn-circle">Delete</button>
                                        </form>
                                        <!-- <a href="/delete-user?name=<?php echo e($user->name); ?>&id=<?php echo e($user->id); ?>" class="btn btn-danger">Delete</a> -->
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Year (Prepare for work)\Laravel\Assignment_Sokim\assignment-web-semester-ll\resources\views/admin/register.blade.php ENDPATH**/ ?>