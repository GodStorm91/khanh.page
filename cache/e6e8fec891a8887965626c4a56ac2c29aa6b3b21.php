<?php $__env->startSection('content'); ?><p><a href="https://fuelphp.com">FuelPHP</a> was a good framework from beginning. It was super easy, intuitivea and straightforward. Although it lacks some of must-have features such as : </p>
<ul>
<li>Dependencies Injection</li>
<li>Templating Engine</li>
</ul>
<p>Then, come <a href="http://laravel.com">Laravel</a> and other newer frameworks make <code>FuelPHP</code> become less attrative on GitHub
... So long for introducing part, let me introduce our problem. </p>
<h2>1. The problem</h2>
<pre><code>When I was using Fuelphp to send email via SES in Japanese the header is completely wrong. </code></pre>
<p>Here is the header:</p>
<pre><code>From: hogehoge@mail.com
To: nukinuki@mail.com
Subject: 【Some subject】パスワー
Message-ID: &lt;0100016b50670058-da13fc7f-cbf7-4fde-9083-b4faab1275f9-000000@email.amazonses.com&gt;
Date: Thu, 13 Jun 2019 10:34:16 +0000
X-SES-Outgoing: 2019.06.13-54.240.8.90
Feedback-ID: 1.us-east-1.3cLUpO+HD0L+B+FopedfEoY28igDyGu4bMyBMMzGqdQ=:AmazonSES

 =?UTF-8?Q?=E3=83=89=E5=86=8D=E7=99=BB=E9=8C=B2=E3=81=AE=E3=81=94=E6=A1=88?=

 =?UTF-8?Q?=E5=86=85?=
MIME-Version: 1.0
Content-Type: text/plain; charset=utf-8
Content-Transfer-Encoding: 7bit</code></pre>
<p>Of-course, the header is broken, and user can't see any of the contents 😭</p>
<h2>2. The solution</h2>
<p>After a little time googling, we found this <a href="http://watanabeyu.blogspot.com/2014/06/fuelphpses.html">Link</a>
Ofcourse, this guy told us the fact that: <code>If your header is more than 18 bytes, your header will be broken and there is no way to fix this ?</code></p>
<p>Are you fucking kidding me ??
Japanese email is <code>somewhat long and cumbersome</code>, so limit your header under 18 bytes (or 9 kanji characters) <strong>is unacceptable</strong>. I know what happen when I told my boss about this.
So I tried to figure out what is the real problem here :</p>
<ul>
<li>Header maybe encoded and encoded result is wrong.</li>
<li>If we allow, encoding header, what should we do? </li>
</ul>
<h3>2.1 The easy way</h3>
<p>Because of the encoding header configuration, things has been gone wrong, so the most intuitive way is to disable it.</p>
<pre><code class="language-php">&lt;<?php echo e('?php'); ?>


return array(
   //省略
    'defaults' =&gt; array(
        'encode_headers' =&gt; false,
    )
    //省略
);
</code></pre>
<h3>2.2 The hard way</h3>
<p>Because encoding header setting need <code>mbstring</code> to be installed, we must have install <code>mbstring</code> first.</p>
<h3>Thoughts:</h3>
<p>Don't have any special thoughts about this problem. I'm considering to move away from FuelPHP to another framework.</p><?php $__env->stopSection(); ?>
<?php echo $__env->make('_layouts.post', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>