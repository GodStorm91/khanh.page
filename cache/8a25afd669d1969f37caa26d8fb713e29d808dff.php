<?php $__env->startPush('meta'); ?>
    <meta property="og:title" content="About <?php echo e($page->siteName); ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="<?php echo e($page->getUrl()); ?>"/>
    <meta property="og:description" content="A little bit about <?php echo e($page->siteName); ?>" />
<?php $__env->stopPush(); ?>

<?php $__env->startSection('body'); ?>
    <h1>About</h1>

    <img src="/assets/img/about.jpg"
        alt="About image"
        class="flex rounded-full h-64 w-64 bg-contain mx-auto md:float-right my-6 md:ml-10">

    <p class="mb-6">Hi I'm Khanh. I am a<code> Web Application Engineer</code></p>

    <p class="mb-6">Currently I'm working for a small startup in Japan called <a href="https://smilesurvey.jp">SmileSurvey</a>. I like working with PHP and AWS the most, a little JS too.</p>

    <p class="mb-6">I am also working on a project called  <a href="https://askvietnamese.vn/home">AskVietnamese</a>, a project support foreign tourists about travel in Vietnam.</p>

    <p class="mb-6">You can contact me via  <code>godstorm91@gmail.com</code>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('_layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>