<?php $__env->startSection('body'); ?>

<section class="section-5 bg-2">
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class="rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Home</a></li>
                        <li class="breadcrumb-item active">Applicants</li>
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
                                <h3 class="fs-4 mb-1">Applicants for Your Jobs</h3>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead class="bg-light">
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th>Job Name</th>
                                        <th>Job Category</th>
                                        <th>Location</th>
                                        <th>Applied Date</th>
                                    </tr>
                                </thead>
                                <tbody class="border-0">
                                    <?php if($applications->isNotEmpty()): ?>
                                        <?php $__currentLoopData = $applications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $application): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($application->user->name); ?></td>
                                                <td><?php echo e($application->user->email); ?></td>
                                                <td><?php echo e($application->user->mobile); ?></td>
                                                <td><?php echo e($application->job->title); ?></td>
                                                <td><?php echo e($application->job->jobType->name); ?></td>
                                                <td><?php echo e($application->job->location); ?></td>
                                                <td><?php echo e(\Carbon\Carbon::parse($application->applied_date)->format('d M, Y')); ?></td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="6">No applicants found for your jobs</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                        <div>
                            
                            <?php echo e($applications->links()); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\component-2-Agarwal7Tarun\JobPortal\resources\views/front/account/job/view-applicants.blade.php ENDPATH**/ ?>