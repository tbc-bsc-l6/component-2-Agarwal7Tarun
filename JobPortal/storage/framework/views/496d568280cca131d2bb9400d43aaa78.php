<?php $__env->startSection('body'); ?>

<section class="section-0 lazy d-flex bg-image-style dark align-items-center " class="" data-bg="<?php echo e(asset('assets/images/banner5.jpg')); ?>">
    <div class="container">
        <div class="row">
            <div class="col-12 col-xl-8">
                <h1>Find your dream job</h1>
                <p>Thounsands of jobs available.</p>
                <div class="banner-btn mt-5"><a href="<?php echo e(route('jobs')); ?>" class="btn btn-primary mb-4 mb-sm-0">Explore Now</a></div>
            </div>
        </div>
    </div>
</section>


<section class="section-1 py-5 ">
    <div class="container">
        <form action="<?php echo e(route('jobs')); ?>" method="get">
        <div class="card border-0 shadow p-5">
            <div class="row">
                <div class="col-md-3 mb-3 mb-sm-3 mb-lg-0">
                    <input type="text" class="form-control" name="keyword" id="keyword" placeholder="Keywords">
                </div>
                <div class="col-md-3 mb-3 mb-sm-3 mb-lg-0">
                    <input type="text" class="form-control" name="location" id="location" placeholder="Location">
                </div>
                <div class="col-md-3 mb-3 mb-sm-3 mb-lg-0">
                    <select name="category" id="category" class="form-control">
                        <option value="">Select a Category</option>
                        <?php if($allCategories->isNotEmpty()): ?>
                           <?php $__currentLoopData = $allCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                       <?php endif; ?>
                    </select>
                </div>

                <div class=" col-md-3 mb-xs-3 mb-sm-3 mb-lg-0">
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary btn-block">Search</button>
                    </div>

                </div>
            </div>
        </div>
    </form>
    </div>
</section>

<section class="section-2 bg-2 py-5">
    <div class="container">
        <h2>Popular Categories</h2>
        <div class="row pt-5">

            <?php if($categories->isNotEmpty()): ?>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-4 col-xl-3 col-md-6">
                        <div class="single_catagory">
                            <a href="<?php echo e(route('jobs').'?category='.$category->id); ?>">
                                <h4 class="pb-2"><?php echo e($category->name); ?></h4>
                            </a>
                            <p class="mb-0">
                                <span><?php echo e($category->jobs()->count()); ?></span> Available position<?php echo e($category->jobs()->count() != 1 ? 's' : ''); ?>

                            </p>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>


        </div>
    </div>
</section>

<section class="section-3  py-5">
    <div class="container">
        <h2>Featured Jobs</h2>
        <div class="row pt-5">
            <div class="job_listing_area">
                <div class="job_lists">
                    <div class="row">

                    <?php if($featuredJobs->isNotEmpty()): ?>
                        <?php $__currentLoopData = $featuredJobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $featuredJob): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <div class="col-md-4">
                            <div class="card border-0 p-3 shadow mb-4">
                                <div class="card-body">
                                    <h3 class="border-0 fs-5 pb-2 mb-0"><?php echo e($featuredJob->title); ?></h3>

                                    <p><?php echo e(Str::words( strip_tags($featuredJob->description), 5)); ?></p>
                                    <div class="bg-light p-3 border">
                                        <p class="mb-0">
                                            <span class="fw-bolder"><i class="fa fa-map-marker"></i></span>
                                            <span class="ps-1"><?php echo e($featuredJob->location); ?></span>
                                        </p>
                                        <p class="mb-0">
                                            <span class="fw-bolder"><i class="fa fa-clock-o"></i></span>
                                            <span class="ps-1"><?php echo e($featuredJob->jobType->name); ?></span>
                                        </p>
                                        <?php if(!is_null($featuredJob->salary)): ?>
                                            <p class="mb-0">
                                                <span class="fw-bolder"><i class="fa fa-usd"></i></span>
                                                <span class="ps-1"><?php echo e($featuredJob->salary); ?></span>
                                            </p>
                                        <?php endif; ?>

                                    </div>

                                    <div class="d-grid mt-3">
                                        <a href="<?php echo e(route('jobDetail', $featuredJob->id)); ?>" class="btn btn-primary btn-lg">Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-3 bg-2 py-5">
    <div class="container">
        <h2>Latest Jobs</h2>
        <div class="row pt-5">
            <div class="job_listing_area">
                <div class="job_lists">
                    <div class="row">
                        <?php if($latestJobs->isNotEmpty()): ?>
                        <?php $__currentLoopData = $latestJobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $latestJob): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <div class="col-md-4">
                            <div class="card border-0 p-3 shadow mb-4">
                                <div class="card-body">
                                    <h3 class="border-0 fs-5 pb-2 mb-0"><?php echo e($latestJob->title); ?></h3>

                                    <p><?php echo e(Str::words( strip_tags($latestJob->description), 5)); ?></p>
                                    <div class="bg-light p-3 border">
                                        <p class="mb-0">
                                            <span class="fw-bolder"><i class="fa fa-map-marker"></i></span>
                                            <span class="ps-1"><?php echo e($latestJob->location); ?></span>
                                        </p>
                                        <p class="mb-0">
                                            <span class="fw-bolder"><i class="fa fa-clock-o"></i></span>
                                            <span class="ps-1"><?php echo e($latestJob->jobType->name); ?></span>
                                        </p>
                                        <?php if(!is_null($latestJob->salary)): ?>
                                            <p class="mb-0">
                                                <span class="fw-bolder"><i class="fa fa-usd"></i></span>
                                                <span class="ps-1"><?php echo e($latestJob->salary); ?></span>
                                            </p>
                                        <?php endif; ?>

                                    </div>

                                    <div class="d-grid mt-3">
                                        <a href="<?php echo e(route('jobDetail', $latestJob->id)); ?>" class="btn btn-primary btn-lg">Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\component-2-Agarwal7Tarun\JobPortal\resources\views/front/home.blade.php ENDPATH**/ ?>