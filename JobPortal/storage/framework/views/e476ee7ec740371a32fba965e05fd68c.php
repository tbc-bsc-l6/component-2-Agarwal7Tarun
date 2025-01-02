

<?php $__env->startSection('body'); ?>
    <div class="container">
        <div class="row pt-5 justify-content-center">
            <div class="col-md-8 col-lg-12 ">
                <div class="news_listing_area">
                    <div class="news_lists">
                        <div class="row">

                            <?php if(!empty($paginatedArticles) && $paginatedArticles->count() > 0): ?>
                                <?php $__currentLoopData = $paginatedArticles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-md-3">
                                        <div class="card border-0 p-3 shadow mb-4" style="min-height: 400px;">
                                            <div class="card-body">
                                                <h3 class="border-0 fs-5 pb-2 mb-0" style="height: 150px"><?php echo e($article['title']); ?></h3>
                                                <p style="height: 50px"><?php echo e(Str::words(strip_tags($article['description']), 6, '...')); ?></p>
                                                <div class="bg-light p-3 border" style="height: 100px">
                                                    <p class="mb-0">
                                                        <span class="fw-bolder"><i class="fa fa-calendar"></i></span>
                                                        <span class="ps-1"><?php echo e($article['publishedAt']); ?></span>
                                                    </p>
                                                    <p class="mb-0">
                                                        <span class="fw-bolder"><i class="fa fa-user"></i></span>
                                                        <span class="ps-1"><?php echo e($article['author'] ?? 'Unknown'); ?></span>
                                                    </p>
                                                </div>

                                                <div class="d-grid mt-3">
                                                    <a href="<?php echo e($article['url']); ?>" class="btn btn-primary btn-lg"
                                                        target="_blank">Read More</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-md-12">
                                    <?php echo e($paginatedArticles->links()); ?> <!-- Pagination if available -->
                                </div>
                            <?php else: ?>
                                <div class="col-md-12">
                                    News not found
                                </div>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\component-2-Agarwal7Tarun\JobPortal\resources\views/news/index.blade.php ENDPATH**/ ?>