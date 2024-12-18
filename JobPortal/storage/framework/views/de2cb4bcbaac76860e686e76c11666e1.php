<?php $__env->startSection('body'); ?>

<section class="section-5 bg-2">
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class=" rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Home</a></li>
                        <li class="breadcrumb-item active">My Jobs</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
            
                <?php echo $__env->make('front.account.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="col-lg-9">
            
                <?php echo $__env->make('front.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <div class="card border-0 shadow mb-4 p-3">
                    <div class="card-body card-form">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h3 class="fs-4 mb-1">My Jobs</h3>
                            </div>
                            <div style="margin-top: -10px;">
                                <a class="btn btn-primary" href="<?php echo e(route('account.createJob')); ?>">Post a Job</a>
                            </div>

                        </div>
                        <div class="table-responsive">
                            <table class="table ">
                                <thead class="bg-light">
                                    <tr>
                                        <th scope="col">Title</th>
                                        <th scope="col">Job Created</th>
                                        <th scope="col">Applicants</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="border-0">
                                    <?php if($jobs->isNotEmpty()): ?>
                                        <?php $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr class="active">
                                            <td>
                                                <div class="job-name fw-500"><?php echo e($job->title); ?></div>
                                                <div class="info1"><?php echo e($job->company_name); ?> | <?php echo e($job->location); ?> | <?php echo e($job->jobType->name); ?> </div>
                                            </td>
                                            <td><?php echo e(\Carbon\Carbon::parse($job->created_at )->format('d M, Y')); ?></td>
                                            <td>
                                                <?php echo e($job->applications->count()); ?> Application<?php echo e($job->applications->count() != 1 ? 's' : ''); ?>

                                            </td>
                                            
                                            <td>
                                                <?php if($job->status == 1): ?>
                                                <div class="job-status text-capitalize">Active</div>
                                                <?php else: ?>
                                                <div class="job-status text-capitalize">Block</div>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <div class="action-dots float-end">
                                                    <button href="#" class="btn" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        
                                                        <li><a class="dropdown-item" href="<?php echo e(route('account.editJob',$job->id)); ?>"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a></li>
                                                        <li><a class="dropdown-item" href="javascript:void(0)" onclick="deleteJob(<?php echo e($job->id); ?>)"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a></li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="5">Jobs not found</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>

                            </table>
                        </div>
                        <div>
                            <?php echo e($jobs->links()); ?>

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
    function deleteJob(jobId){
        if(confirm("Are you sure you want to delete?")){
            $.ajax({
                type: "POST",
                url: '<?php echo e(route("account.deleteJob")); ?>',
                data: {jobId},
                dataType: "json",
                success: function (response) {

                    if(response.status == true){
                        window.location.href="<?php echo e(route('account.myJobs')); ?>";
                    }
                }
            });
        }
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\component-2-Agarwal7Tarun\JobPortal\resources\views/front/account/job/my-jobs.blade.php ENDPATH**/ ?>