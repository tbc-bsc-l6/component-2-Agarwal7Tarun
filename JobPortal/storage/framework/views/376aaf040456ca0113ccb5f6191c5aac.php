<div class="card account-nav border-0 shadow mb-4 mb-lg-0">
    <div class="card-body p-0">
        <ul class="list-group list-group-flush ">
            <li class="list-group-item d-flex justify-content-between p-3">
                <a class="<?php echo e(Request::is('admin/users') ? 'light-green' : ''); ?>" href="<?php echo e(route('admin.users')); ?>">Users</a>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <a class="<?php echo e(Request::is('admin/jobs') ? 'light-green' : ''); ?>" href="<?php echo e(route('admin.jobs')); ?>">Jobs</a>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <a class="<?php echo e(Request::is('admin/job-applications') ? 'light-green' : ''); ?>" href="<?php echo e(route('admin.jobApplications')); ?>">Job Applications</a>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <a class="<?php echo e(Request::is('admin/categories') ? 'light-green' : ''); ?>" href="<?php echo e(route('admin.categories')); ?>">Categories</a>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <a class="<?php echo e(Request::is('admin/job-types') ? 'light-green' : ''); ?>" href="<?php echo e(route('admin.job_types')); ?>">Job Types</a>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <a href="<?php echo e(route('account.logout')); ?>">Logout</a>
            </li>
        </ul>
    </div>
</div>


<?php /**PATH C:\xampp\htdocs\component-2-Agarwal7Tarun\JobPortal\resources\views/admin/sidebar.blade.php ENDPATH**/ ?>