<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Job Notification Email</title>
</head>
<body>

    <h1>Hello: <?php echo e($mailData['employer']->name); ?></h1>
    <p>Job Title: <?php echo e($mailData['job']->title); ?></p>

    <p>Applicant Details: </p>

    <p>Name: <?php echo e($mailData['user']->name); ?></p>
    <p>Email: <?php echo e($mailData['user']->email); ?></p>
    <p>Mobile No: <?php echo e($mailData['user']->mobile); ?></p>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\component-2-Agarwal7Tarun\JobPortal\resources\views/email/job-notification-email.blade.php ENDPATH**/ ?>