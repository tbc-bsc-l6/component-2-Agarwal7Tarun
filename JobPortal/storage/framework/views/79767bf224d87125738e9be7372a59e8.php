<?php $__env->startSection('body'); ?>
<section class="section-5 bg-2">
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class=" rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.job_types')); ?>">Job Types</a></li>
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
                        <form action="" method="post" id="updateJobType" name="updateJobType">
                            <?php echo csrf_field(); ?>
                            <div class="card-body  p-4">
                                <h3 class="fs-4 mb-1">Job Type / Edit</h3>
                                <div class="mb-4">
                                    <label for="" class="mb-2">Name <span class="text-danger">*</span></label>
                                    <input type="text" value="<?php echo e($job_type->name); ?>" name="name" id="name" placeholder="Enter category Name" class="form-control">
                                    <p></p>
                                </div>
                                <div class="mb-4">
                                    <label for="" class="mb-2">Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option <?php echo e(($job_type->status == 1) ? 'selected' : ''); ?> value="1">Active</option>
                                        <option <?php echo e(($job_type->status == 0) ? 'selected' : ''); ?> value="0">Block</option>
                                    </select>
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


$("#updateJobType").submit(function (e) {
        e.preventDefault();

        $.ajax({
            type: "put",
            url: "<?php echo e(route('admin.job_types.update',$job_type->id)); ?>",
            data: $("#updateJobType").serializeArray(),
            dataType: "json",
            success: function (response) {
                if(response.status == true){

                    $("#name").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
                    window.location.href="<?php echo e(route('admin.job_types')); ?>";

                }else{

                    var errors = response.errors;
                    // For name
                    if(errors.name){
                        $("#name").addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors.name);
                    }else{
                        $("#name").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
                    }

                }
            }
        });

    });

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\component-2-Agarwal7Tarun\JobPortal\resources\views/admin/JobTypes/edit.blade.php ENDPATH**/ ?>