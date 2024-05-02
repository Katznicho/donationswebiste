<!DOCTYPE html>
<html lang="en">
<script src="https://cdn.tailwindcss.com"></script>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title'); ?></title>
            <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>

</head>
<body>
    <?php echo $__env->make('partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="content">
        <?php echo $__env->yieldContent('content'); ?>
    </div>

    <?php echo $__env->make('partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Add your scripts here -->

</body>

</html><?php /**PATH /home4/fountainofpeaceo/dummy.fountainofpeace.org.ug/resources/views/layouts/home.blade.php ENDPATH**/ ?>