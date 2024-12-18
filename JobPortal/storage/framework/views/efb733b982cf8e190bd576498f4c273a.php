<div class="card border-0 shadow mb-4 p-3">
    <div class="s-body text-center mt-3">

        <?php if(Auth::user()->image != ''): ?>
        <img src="<?php echo e(asset('/profile_img/thumb/'.Auth::user()->image)); ?>" alt="avatar"  class="rounded-circle img-fluid" style="width: 150px;">
        <?php else: ?>
        <img src="<?php echo e(asset('assets/images/avatar7.png')); ?>" alt="avatar"  class="rounded-circle img-fluid" style="width: 150px;">
        <?php endif; ?>
        
        <h5 class="mt-3 pb-0"><?php echo e(Auth::user()->name); ?></h5>
        <p class="text-muted mb-1 fs-6"><?php echo e(Auth::user()->designation); ?></p>
        <div class="d-flex justify-content-center mb-2">
            <button data-bs-toggle="modal" data-bs-target="#exampleModal" type="button" class="btn btn-primary">Change Profile Picture</button>
        </div>
    </div>
</div>
<div class="card account-nav border-0 shadow mb-4 mb-lg-0">
    <div class="card-body p-0">
        <ul class="list-group list-group-flush ">
            <li class="list-group-item d-flex justify-content-between p-3">
                <a href="<?php echo e(route('account.profile')); ?>">Account Settings</a>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <a href="<?php echo e(route('account.createJob')); ?>">Post a Job</a>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <a href="<?php echo e(route('account.myJobs')); ?>">My Jobs</a>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <a href="<?php echo e(route('account.myJobApplications')); ?>">Jobs Applied</a>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <a href="<?php echo e(route('account.savedJobs')); ?>">Saved Jobs</a>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <a href="<?php echo e(route('account.logout')); ?>">Logout</a>
            </li>                                                            
        </ul>
    </div>
</div><?php /**PATH C:\xampp\htdocs\component-2-Agarwal7Tarun\JobPortal\resources\views/front/account/sidebar.blade.php ENDPATH**/ ?>