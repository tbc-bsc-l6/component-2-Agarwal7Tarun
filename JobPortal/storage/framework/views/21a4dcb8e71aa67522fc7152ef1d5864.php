<?php $__env->startSection('body'); ?>
<section class="section-5 bg-2">
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class=" rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.users')); ?>">Users</a></li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <?php echo $__env->make('admin.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="col-lg-9">
                <?php echo $__env->make('front.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <div class="card border-0 shadow mb-4">
                    <div class="card-body card-form">
                        <form action="" method="post" id="editUser" name="editUser">
                            <?php echo csrf_field(); ?>
                            <div class="card-body  p-4">
                                <h3 class="fs-4 mb-1">User / Edit</h3>
                                <div class="mb-4">
                                    <label for="" class="mb-2">Name*</label>
                                    <input type="text" value="<?php echo e($user->name); ?>" name="name" id="name" placeholder="Enter Name" class="form-control">
                                    <p></p>
                                </div>
                                <div class="mb-4">
                                    <label for="" class="mb-2">Email*</label>
                                    <input type="text" value="<?php echo e($user->email); ?>" name="email" id="email" placeholder="Enter Email" class="form-control">
                                    <p></p>
                                </div>
                                <div class="mb-4">
                                    <label for="" class="mb-2">Designation</label>
                                    <input type="text" value="<?php echo e($user->designation); ?>" name="designation" id="designation" placeholder="Designation" class="form-control">
                                </div>
                                <div class="mb-4">
                                    <label for="" class="mb-2">Mobile</label>
                                    <input type="text" value="<?php echo e($user->mobile); ?>" name="mobile" id="mobile" placeholder="Mobile" class="form-control">
                                </div>
                            </div>
                            <div class="card-footer  p-4">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('customJs'); ?>
    <script type="text/javascript">


$("#editUser").submit(function (e) {
        e.preventDefault();

        $.ajax({
            type: "put",
            url: "<?php echo e(route('admin.user.update',$user->id)); ?>",
            data: $("#editUser").serializeArray(),
            dataType: "json",
            success: function (response) {
                if(response.status == true){

                    $("#name").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
                    $("#email").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
                    window.location.href="<?php echo e(route('admin.users')); ?>";

                }else{

                    var errors = response.errors;
                    // For name
                    if(errors.name){
                        $("#name").addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors.name);
                    }else{
                        $("#name").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
                    }

                    // For email
                    if(errors.email){
                        $("#email").addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors.email);
                    }else{
                        $("#email").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
                    }
                }
            }
        });

    });

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\component-2-Agarwal7Tarun\JobPortal\resources\views/admin/users/edit.blade.php ENDPATH**/ ?>