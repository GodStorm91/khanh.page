<?php $__env->startSection('content'); ?><p>Today I received a comment from my friends telling me that my blog doesn't redirect to 404.
Oops...
I should have been set it from the beginning instead of making my blog showing something like this:</p>
<pre><code>403 Forbidden
Code: AccessDenied
Message: Access Denied
RequestId: 5F9506201FD3BF09
HostId: DlHKCh+6eIyX1OILlLEt2FVz2BMgn3luo6lNcx6xxMr3F0wntH5jDqHQ78Q77i1JWcoEN9xb//c=</code></pre>
<p>We should have been let user see something much more <strong>friendly</strong> instead of something frank, coldhearted like the error above.
Below is the steps I have done to make it works.</p>
<ol>
<li>Create a 404 folder and its content (the friendlier things I want my user to see)</li>
<li>Settings S3 error pages in AWS console</li>
<li>Invalidate cloudfront cache (in case you are using Cloudfront as your CDN)</li>
</ol>
<h3>1. Create a 404 folder</h3>
<p>I've used <code>Jigsaw</code> as my blog cms, so things is super easy. I just have to create a <code>404.blade.php</code> and put it in my root directory. When I do compile the code for deploy, <code>404.html</code> file will be generated.</p>
<pre><code class="language-html"><?php echo e('@'); ?>extends('_layouts.master')

<?php echo e('@'); ?>section('body')
    &lt;div class="flex flex-col items-center text-grey-darker mt-32"&gt;
        &lt;h1 class="text-6xl font-light leading-none mb-2"&gt;404&lt;/h1&gt;

        &lt;h2 class="text-3xl"&gt;Page not found.&lt;/h2&gt;

        &lt;hr class="block w-full max-w-sm mx-auto border my-8"&gt;

        &lt;p class="text-xl"&gt;
            Need to update this page? See the &lt;a title="404 Page Documentation" href="https://jigsaw.tighten.co/docs/custom-404-page/"&gt;Jigsaw documentation&lt;/a&gt;.
        &lt;/p&gt;
    &lt;/div&gt;
<?php echo e('@'); ?>endsection</code></pre>
<p>Now, things is pretty better like this </p>
<p><img src="/assets/img/custom-404.png" alt="404-image" /></p>
<h3>2. Settings S3 error pages in AWS Console</h3>
<p>S3 console provide a way to set your error pages (whenever some key is not found or permission forbidden)
You can set the error pages as below (the path will be based on the bucket root directory )</p>
<p><img src="/assets/img/s3-error-config.png" alt="s3-error-config" /></p>
<p>If you don't use any CDN, you can skip step 3, everything now should work fine.
If you use CDN, you need to clear the cache (or request invalidation as in AWS )</p>
<h3>3. Create invalidation request</h3>
<p>You can use AWS Console to create invalition request ( a cache clear request - all of the cache will be updated to the newest contents from origin - so this is an expensive step, please use it considerably).</p>
<p>I use aws command line to create invalidation, you can use my command or console to create invalidation.</p>
<pre><code class="language-bash"> aws cloudfront create-invalidation --distribution-id &lt;distribution_id&gt; --paths "/*" --profile &lt;profile_id&gt;</code></pre>
<p>After that, you can confirm whether your changes have been updated and delegated to all edge locations
(Please wait about 4,5 minutes for changes completely reflected all edge locations.)</p><?php $__env->stopSection(); ?>
<?php echo $__env->make('_layouts.post', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>