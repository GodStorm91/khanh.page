<?php $__env->startSection('content'); ?><p>Due to lack of keyboard and my own intend to write in English.
From now on, all of my blog post will be written in English, but I will try to translate some of its content to Vietnamese to encourage reader from Vietnam
(Of course I want to encourage Vietnamese reader to learn another )</p>
<h2>FuelPHP and MongoDB</h2>
<h3>1. The Story of PHP MongoDB Driver.</h3>
<p>Yes, the FuelPHP core has a class support for MongoDB a long, long time ago.
We can find it here
<code>fuel/core/classes/mongo/db.php</code></p>
<p>But the problem is, MongoDB PHP Driver has been re-written.
<a href="https://derickrethans.nl/new-drivers.html">Link</a>
Denik Rethans has started to become a MongoDB PHP Driver maintainer around 2012, and he released it around the end of 2015 and this driver supported the newer PHP7.x
You can read more about the story why he undertook this effort as well as the architect under the hood <a href="https://derickrethans.nl/new-drivers-part2.html">here</a> . </p>
<p>Now we move on to the next, integrate the new driver with the FuelPHP framework.
To integrate the framework with our current blogpost</p>
<pre><code></code></pre><?php $__env->stopSection(); ?>
<?php echo $__env->make('_layouts.post', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>