<?php $__env->startSection('content'); ?>
<center>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Login</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="/login/checklogin">
                            <?php echo e(csrf_field()); ?>


                            <div class="form-group row">
                                <label for="email" class="col-sm-4 col-form-label text-md-right"><?php echo e(__('E-Mail Address')); ?></label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email" value="<?php echo e(old('email')); ?>" required autofocus>

                                    <?php if($errors->has('email')): ?>
                                        <span class="invalid-feedback">
                                            <strong><?php echo e($errors->first('email')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Password')); ?></label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" name="password" required>

                                    <?php if($errors->has('password')): ?>
                                        <span class="invalid-feedback">
                                            <strong><?php echo e($errors->first('password')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>> <?php echo e(__('Remember Me')); ?>

                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        <?php echo e(__('Login')); ?>

                                    </button>
                                </div>
                            </div>
                            <!-- <?php echo e(csrf_field()); ?>

                            <div class="form-group">
                                <label class="col-sm-2 col-form-label">Enter Email</label>
                                <input type="email" name="email" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-form-label">Enter Password</label>
                                <input type="password" name="password" class="form-control" />
                            </div>
                            <div class="form-group">
                                <input type="submit" name="login" class="btn btn-primary" value="Login" />
                            </div> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</center>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\assignment-web-semester-ll\assignment-web-semester-ll\resources\views/auth/login.blade.php ENDPATH**/ ?>