<?php $__env->startSection('body'); ?>
<section class="section-5 bg-2">
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class=" rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Home</a></li>
                        <li class="breadcrumb-item active">Job Applications</li>
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
                        <div class="d-flex justify-content-between">
                            <div>
                                <h3 class="fs-4 mb-1">Job Applications</h3>
                            </div>

                        </div>
                        <div class="table-responsive">
                            <table class="table ">
                                <thead class="bg-light">
                                    <tr>
                                        <th scope="col">Job Title</th>
                                        <th scope="col">Applicant</th>
                                        <th scope="col">Employer</th>
                                        <th scope="col">Applied Date</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="border-0">
                                    <?php if($jobApplications->isNotEmpty()): ?>
                                        <?php $__currentLoopData = $jobApplications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jobApplication): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr class="active">
                                            <td>
                                                <div class="job-name fw-500"><?php echo e($jobApplication->job->title); ?></div>
                                                
                                            </td>
                                            <td><?php echo e($jobApplication->user->name); ?></td>
                                            <td><?php echo e($jobApplication->employer->name); ?></td>
                                            <td><?php echo e(\Carbon\Carbon::parse($jobApplication->applied_date )->format('d M, Y')); ?></td>
                                            <td>
                                                <div class="action-dots">
                                                    <button href="#" class="btn" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <li><a class="dropdown-item" href="<?php echo e(route('jobDetail',$jobApplication->job_id)); ?>"> <i class="fa fa-eye" aria-hidden="true"></i> View</a></li>
                                                        <li><a class="dropdown-item" href="javascript:void(0)" onclick="removeJob(<?php echo e($jobApplication->id); ?>)"><i class="fa fa-trash" aria-hidden="true"></i> Remove</a></li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="5">Job Applications not found</td>
                                        </tr>
                                    <?php endif; ?>

                                </tbody>

                            </table>
                        </div>
                        <div>
                            <?php echo e($jobApplications->links()); ?>

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
        function removeJob(job_id){
            if(confirm('Are you sure you want to remove?')){
                $.ajax({
                    type: "delete",
                    url: "<?php echo e(route('admin.jobApplications.destroy')); ?>",
                    data: {job_id},
                    dataType: "json",
                    success: function (response) {
                        if(response.status == true){
                            window.location.href="<?php echo e(route('admin.jobApplications')); ?>";
                        }
                    }
                });
            }
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\component-2-Agarwal7Tarun\JobPortal\resources\views/admin/job-applications/list.blade.php ENDPATH**/ ?>