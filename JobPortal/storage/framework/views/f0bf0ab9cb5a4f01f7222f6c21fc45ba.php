

<?php $__env->startSection('body'); ?>
<section class="section-5 bg-2">
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class=" rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.jobs')); ?>">Jobs</a></li>
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
                <form action="" name="updateJobForm" id="updateJobForm">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('put'); ?>
                    <div class="card border-0 shadow mb-4">
                        <div class="card-body card-form p-4">
                            <h3 class="fs-4 mb-1">Job / Edit</h3>
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label for="" class="mb-2">Title<span class="req">*</span></label>
                                    <input type="text" value="<?php echo e($job->title); ?>" placeholder="Job Title" id="title" name="title" class="form-control">
                                    <p></p>
                                </div>
                                <div class="col-md-6  mb-4">
                                    <label for="" class="mb-2">Category<span class="req">*</span></label>
                                    <select name="category" id="category" class="form-control">
                                        <option value="">Select a Category</option>
                                        <?php if($categories->isNotEmpty()): ?>
                                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option <?php echo e(($job->category_id == $category->id) ? 'selected' : ''); ?> value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </select>
                                    <p></p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label for="" class="mb-2">Job Type<span class="req">*</span></label>
                                    <select name="jobType" id="jobType" class="form-select">
                                        <option value="">Select Job Type</option>
                                        <?php if($job_types->isNotEmpty()): ?>
                                        <?php $__currentLoopData = $job_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option <?php echo e(($job->job_type_id == $job_type->id) ? 'selected' : ''); ?> value="<?php echo e($job_type->id); ?>"><?php echo e($job_type->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </select>
                                    <p></p>
                                </div>
                                <div class="col-md-6  mb-4">
                                    <label for="" class="mb-2">Vacancy<span class="req">*</span></label>
                                    <input value="<?php echo e($job->vacancy); ?>" type="number" min="1" placeholder="Vacancy" id="vacancy" name="vacancy" class="form-control">
                                    <p></p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="mb-4 col-md-6">
                                    <label for="" class="mb-2">Salary</label>
                                    <input value="<?php echo e($job->salary); ?>" type="text" placeholder="Salary" id="salary" name="salary" class="form-control">
                                </div>

                                <div class="mb-4 col-md-6">
                                    <label for="" class="mb-2">Location<span class="req">*</span></label>
                                    <input value="<?php echo e($job->location); ?>" type="text" placeholder="Location" id="location" name="location" class="form-control">
                                    <p></p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="mb-4 col-md-6">
                                    <div class="form-check">
                                        <input <?php echo e(($job->isFeatured == 1) ? 'checked' : ''); ?> class="form-check-input" type="checkbox" value="1" id="isFeatured" name="isFeatured">
                                        <label class="form-check-label" for="isFeatured">
                                            Featured
                                        </label>
                                    </div>
                                </div>
                                <div class="mb-4 col-md-6">
                                    <div class="form-check-inline">
                                        <input <?php echo e(($job->status == 1) ? 'checked' : ''); ?> class="form-check-input" type="radio" value="1" id="status-active" name="status">
                                        <label class="form-check-label" for="status">
                                            Active
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <input <?php echo e(($job->status == 0) ? 'checked' : ''); ?> class="form-check-input" type="radio" value="0" id="status-block" name="status">
                                        <label class="form-check-label" for="status">
                                            Block
                                        </label>
                                    </div>
                                </div>
                            </div>



                            <div class="mb-4">
                                <label for="" class="mb-2">Description<span class="req">*</span></label>
                                <textarea class="form-control" name="description" id="description" cols="5" rows="5" placeholder="Description"><?php echo e($job->description); ?></textarea>
                                <p></p>
                            </div>
                            <div class="mb-4">
                                <label for="" class="mb-2">Benefits</label>
                                <textarea class="form-control" name="benefits" id="benefits" cols="5" rows="5" placeholder="Benefits"><?php echo e($job->benefits); ?></textarea>
                                <p></p>
                            </div>
                            <div class="mb-4">
                                <label for="" class="mb-2">Responsibility</label>
                                <textarea class="form-control" name="responsibility" id="responsibility" cols="5" rows="5" placeholder="Responsibility"><?php echo e($job->responsibility); ?></textarea>
                                <p></p>
                            </div>
                            <div class="mb-4">
                                <label for="" class="mb-2">Qualifications</label>
                                <textarea class="form-control" name="qualification" id="qualification" cols="5" rows="5" placeholder="Qualification"><?php echo e($job->qualification); ?></textarea>
                                <p></p>
                            </div>

                            <div class="mb-4">
                                <label for="" class="mb-2">Experience<span class="req">*</span></label>
                                <select name="experience" id="experience" class="form-control">
                                    <option value="">Select Experience</option>
                                    <option value="1" <?php echo e(($job->experience == 1) ? 'selected' : ''); ?>>1 Years</option>
                                    <option value="2" <?php echo e(($job->experience == 2) ? 'selected' : ''); ?>>2 Years</option>
                                    <option value="3" <?php echo e(($job->experience == 3) ? 'selected' : ''); ?>>3 Years</option>
                                    <option value="4" <?php echo e(($job->experience == 4) ? 'selected' : ''); ?>>4 Years</option>
                                    <option value="5" <?php echo e(($job->experience == 5) ? 'selected' : ''); ?>>5 Years</option>
                                    <option value="6" <?php echo e(($job->experience == 6) ? 'selected' : ''); ?>>6 Years</option>
                                    <option value="7" <?php echo e(($job->experience == 7) ? 'selected' : ''); ?>>7 Years</option>
                                    <option value="8" <?php echo e(($job->experience == 8) ? 'selected' : ''); ?>>8 Years</option>
                                    <option value="9" <?php echo e(($job->experience == 9) ? 'selected' : ''); ?>>9 Years</option>
                                    <option value="10" <?php echo e(($job->experience == 10) ? 'selected' : ''); ?>>10 Years</option>
                                    <option value="10_plus" <?php echo e(($job->experience == '10_plus') ? 'selected' : ''); ?>>10+ Years</option>
                                </select>
                                <p></p>
                            </div>

                            <div class="mb-4">
                                <label for="" class="mb-2">Keywords</label>
                                <input value="<?php echo e($job->keywords); ?>" type="text" placeholder="keywords" id="keywords" name="keywords" class="form-control">
                            </div>

                            <h3 class="fs-4 mb-1 mt-5 border-top pt-5">Company Details</h3>

                            <div class="row">
                                <div class="mb-4 col-md-6">
                                    <label for="" class="mb-2">Name<span class="req">*</span></label>
                                    <input value="<?php echo e($job->company_name); ?>" type="text" placeholder="Company Name" id="company_name" name="company_name" class="form-control">
                                    <p></p>
                                </div>

                                <div class="mb-4 col-md-6">
                                    <label for="" class="mb-2">Location</label>
                                    <input value="<?php echo e($job->company_location); ?>" type="text" placeholder="Location" id="company_location" name="company_location" class="form-control">
                                </div>
                            </div>
                            <div class="mb-4">
                                <label for="" class="mb-2">Website</label>
                                <input value="<?php echo e($job->company_website); ?>" type="text" placeholder="Website" id="company_website" name="company_website" class="form-control">
                            </div>
                        </div>
                        <div class="card-footer  p-4">
                            <button type="submit" class="btn btn-primary">Update Job</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('customJs'); ?>
    <script type="text/javascript">
        $("#updateJobForm").submit(function (e) {
            e.preventDefault();

            $("button[type='submit']").prop('disabled',true);

            $.ajax({
                type: "put",
                url: "<?php echo e(route('admin.job.update',$job->id)); ?>",
                data: $("#updateJobForm").serializeArray(),
                dataType: "json",
                success: function (response) {

                    $("button[type='submit']").prop('disabled',false);

                    if(response.status == true){

                        $("#title").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
                        $("#category").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
                        $("#jobType").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
                        $("#vacancy").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
                        $("#location").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
                        $("#description").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
                        $("#experience").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
                        $("#company_name").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
                        window.location.href="<?php echo e(route('admin.jobs')); ?>";

                    }else{

                        var errors = response.errors;
                        // For name
                        if(errors.title){
                            $("#title").addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors.title);
                        }else{
                            $("#title").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
                        }

                        // For category
                        if(errors.category){
                            $("#category").addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors.category);
                        }else{
                            $("#category").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
                        }

                        // For jobType
                        if(errors.jobType){
                            $("#jobType").addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors.jobType);
                        }else{
                            $("#jobType").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
                        }


                        // For vacancy
                        if(errors.vacancy){
                            $("#vacancy").addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors.vacancy);
                        }else{
                            $("#vacancy").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
                        }

                        // For location
                        if(errors.location){
                            $("#location").addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors.location);
                        }else{
                            $("#location").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
                        }

                        // For description
                        if(errors.description){
                            $("#description").addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors.description);
                        }else{
                            $("#description").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
                        }

                        // For Experience
                        if(errors.experience){
                            $("#experience").addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors.experience);
                        }else{
                            $("#experience").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
                        }


                        // For company name
                        if(errors.company_name){
                            $("#company_name").addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors.company_name);
                        }else{
                            $("#company_name").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
                        }
                    }
                }
            });

        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\component-2-Agarwal7Tarun\JobPortal\resources\views/admin/jobs/edit.blade.php ENDPATH**/ ?>