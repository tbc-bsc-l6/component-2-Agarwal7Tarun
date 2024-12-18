

<?php $__env->startSection('body'); ?>

<section class="section-5">
    <div class="container my-5">
        <div class="py-lg-2">&nbsp;</div>

        <?php if(Session::has('success')): ?>
            <div class="alert alert-success">
                <p class="mb-0 pb-0"><?php echo e(Session::get('success')); ?></p>
            </div>
        <?php endif; ?>

        <?php if(Session::has('error')): ?>
            <div class="alert alert-danger">
                <p class="mb-0 pb-0"><?php echo e(Session::get('error')); ?></p>
            </div>
        <?php endif; ?>

        <div class="row d-flex justify-content-center">
            <div class="col-md-5">
                <div class="card shadow border-0 p-5">
                    <h1 class="h3">Forgot Password</h1>
                    <form action="<?php echo e(route('account.processForgotPassword')); ?>" method="post" name="loginForm" id="loginForm">
                        <?php echo csrf_field(); ?>
                        <div class="mb-3">
                            <label for="" class="mb-2">Email*</label>
                            <input type="text" value="<?php echo e(old('email')); ?>" name="email" id="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="example@example.com">
                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="invalid-feedback"><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="justify-content-between d-flex">
                        <button class="btn btn-primary mt-2" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
                <div class="mt-4 float-end">
                    <p><a  href="<?php echo e(route('account.login')); ?>">Back to login</a></p>
                </div>
            </div>
        </div>
        <div class="py-lg-5">&nbsp;</div>
    </div>
</section>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title pb-0" id="exampleModalLabel">Change Profile Picture</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Profile Image</label>
                <input type="file" class="form-control" id="image"  name="image">
            </div>
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary mx-3">Update</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>

        </form>
      </div>
    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('customJs'); ?>
    <script>

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\component-2-Agarwal7Tarun\JobPortal\resources\views/front/account/forgot-password.blade.php ENDPATH**/ ?>