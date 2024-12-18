


<?php $__env->startSection('body'); ?>

<section class="section-4 bg-2">
    <div class="container pt-5">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class=" rounded-3 p-3">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('jobs')); ?>"><i class="fa fa-arrow-left" aria-hidden="true"></i> &nbsp;Back to Jobs</a></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="container job_details_area">
        <div class="row pb-5">
            <div class="col-md-8">

                
                    <?php echo $__env->make('front.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                

                <div class="card shadow border-0">
                    <div class="job_details_header">
                        <div class="single_jobs white-bg d-flex justify-content-between">
                            <div class="jobs_left d-flex align-items-center">

                                <div class="jobs_conetent">
                                    <a href="#">
                                        <h4><?php echo e($job->title); ?></h4>
                                    </a>
                                    <div class="links_locat d-flex align-items-center">
                                        <div class="location">
                                            <p> <i class="fa fa-map-marker"></i> <?php echo e($job->location); ?></p>
                                        </div>
                                        <div class="location">
                                            <p> <i class="fa fa-clock-o"></i> <?php echo e($job->jobType->name); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="jobs_right">
                                <div class="apply_now <?php echo e(($count==1) ? 'saved-job' : ''); ?>">
                                    <a class="heart_mark" href="javascript:void(0);" onclick="saveJob(<?php echo e($job->id); ?>)"> <i class="fa fa-heart-o" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="descript_wrap white-bg">
                        <div class="single_wrap">
                            <h4>Job description</h4>
                              <p><?php echo nl2br($job->description); ?></p>
                        </div>

                        <?php if(!empty($job->responsibility)): ?>
                            <div class="single_wrap">
                                <h4>Responsibility</h4>
                                <?php echo nl2br($job->responsibility); ?>

                            </div>
                        <?php endif; ?>

                        <?php if(!empty($job->qualifications)): ?>
                            <div class="single_wrap">
                                <h4>Qualifications</h4>
                                <?php echo nl2br($job->qualifications); ?>

                            </div>
                        <?php endif; ?>


                        <?php if(!empty($job->benefits)): ?>
                            <div class="single_wrap">
                                <h4>Benefits</h4>
                                <p><?php echo nl2br($job->benefits); ?></p>
                            </div>
                        <?php endif; ?>

                        <div class="border-bottom"></div>
                        <div class="pt-3 text-end">

                            <?php if(Auth::check()): ?>
                                <a href="#" onclick="saveJob(<?php echo e($job->id); ?>)" class="btn btn-secondary">Save</a>
                            <?php else: ?>
                                <a href="javascript:void(0)" class="btn btn-secondary disabled">Login to Save</a>
                            <?php endif; ?>

                            <?php if(Auth::check()): ?>
                                <a href="javascript:void(0)" onclick="applyJob(<?php echo e($job->id); ?>)" class="btn btn-primary">Apply</a>
                            <?php else: ?>
                                <a href="javascript:void(0)" class="btn btn-primary disabled">Login to Apply</a>
                            <?php endif; ?>


                        </div>
                    </div>
                </div>

                <?php if(Auth::user()): ?>
                <?php if(Auth::user()->id == $job->user_id): ?>

                <div class="card shadow border-0 mt-4">
                    <div class="job_details_header">
                        <div class="single_jobs white-bg d-flex justify-content-between">
                            <div class="jobs_left d-flex align-items-center">

                                <div class="jobs_conetent">
                                        <h4>Applicants</h4>

                                </div>
                            </div>
                            <div class="jobs_right"></div>
                        </div>
                    </div>
                    <div class="descript_wrap white-bg">
                        <table class="table table-striped">
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Applied Date</th>
                            </tr>
                            <?php if($applications->isNotEmpty()): ?>
                                <?php $__currentLoopData = $applications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $application): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($application->user->name); ?></td>
                                        <td><?php echo e($application->user->email); ?></td>
                                        <td><?php echo e($application->user->mobile); ?></td>
                                        <td> <?php echo e(\Carbon\Carbon::parse($application->applied_date)->format('d M, Y')); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="3">Applicants not found</td>
                                    </tr>
                            <?php endif; ?>

                        </table>

                    </div>
                </div>

                <?php endif; ?>
                <?php endif; ?>

            </div>
            <div class="col-md-4">
                <div class="card shadow border-0">
                    <div class="job_sumary">
                        <div class="summery_header pb-1 pt-4">
                            <h3>Job Summery</h3>
                        </div>
                        <div class="job_content pt-3">
                            <ul>
                                <li>Published on: <span><?php echo e(\Carbon\Carbon::parse($job->created_at)->format('d M, Y')); ?></span></li>
                                <li>Vacancy: <span><?php echo e($job->vacancy); ?> Position</span></li>

                                <?php if(!empty($job->salary)): ?>
                                    <li>Salary: <span><?php echo e($job->salary); ?></span></li>
                                <?php endif; ?>

                                <li>Location: <span><?php echo e($job->location); ?></span></li>
                                <li>Job Nature: <span> <?php echo e($job->jobType->name); ?></span></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card shadow border-0 my-4">
                    <div class="job_sumary">
                        <div class="summery_header pb-1 pt-4">
                            <h3>Company Details</h3>
                        </div>
                        <div class="job_content pt-3">
                            <ul>
                                <li>Name: <span><?php echo e($job->company_name); ?></span></li>

                                <?php if(!empty($job->company_location)): ?>
                                    <li>Locaion: <span><?php echo e($job->company_location); ?></span></li>
                                <?php endif; ?>

                                <?php if(!empty($job->company_website)): ?>
                                 <li>Webite: <span><a href="<?php echo e($job->company_website); ?>" target="_blank"><?php echo e($job->company_website); ?></a></span></li>
                                <?php endif; ?>

                            </ul>
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
        function applyJob(id){

            if(confirm('Are you sure you want to apply on this job?')){
                $.ajax({
                    type: "POST",
                    // url: '<?php echo e(route("applyJob")); ?>',
                    data: {id:id},
                    dataType: "json",
                    success: function (response) {
                        window.location.href = "<?php echo e(url()->current()); ?>";
                    }
                });
            }
        }

        // Save job

        function saveJob(id){
            $.ajax({
                type: "POST",
                url: '<?php echo e(route("saveJob")); ?>',
                data: {id:id},
                dataType: "json",
                success: function (response) {
                    window.location.href = "<?php echo e(url()->current()); ?>";
                }
            });
        }

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\component-2-Agarwal7Tarun\JobPortal\resources\views/front/jobDetail.blade.php ENDPATH**/ ?>