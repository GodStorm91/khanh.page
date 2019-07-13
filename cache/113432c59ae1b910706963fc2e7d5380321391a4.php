<?php $__env->startSection('content'); ?><h2>Mở đầu</h2>
<p>Hôm nay mình rất là hứng thú khi AWS bắt đầu roll out layer cho serverless. Tại sao vậy ? Bởi vì khi roll out layer cho serverless, chúng ta có thể chạy bất kì ngôn ngữ lập trình nào trên lambda service :) <strong>Is it cool?</strong></p>
<p>Lambda với layer được giới thiệu vào cuối tháng 11/2018 bao gồm các feature như bên dưới </p>
<ul>
<li><strong>Lambda Layers</strong>: một dịch vụ giúp chúng ta có thể chia sẻ những đoạn code common, hoặc runtime, hoặc data. Mỗi một layers, chúng ta có thể versioning chúng. Sẽ có một vài lợi ích khi sử dụng <strong>Lambda Layers</strong>:
<ul>
<li>Tách lớp</li>
<li>Giúp function code ít hơn, tập trung vào tính năng hơn </li>
<li>Tăng tốc deployment (do các libraries cũng như runtime đã được deploy sẵn)</li>
</ul></li>
<li><strong>Lambda Runtime API</strong>: Đây là một bộ API do AWS cung cấp (Http API) để từng <em>custom layers</em> có thể nhận events từ Lambda và gửi response lại cho Lambda, nói cách khác để các layers trong Lambda tương tác với nhau, chúng ta có thể sử dụng Lambda Layers</li>
</ul>
<h2>Bref là gì</h2>
<p>Bref là một bộ công cụ được cài đặt thông qua <code>Composer</code> (quá tuyệt vời), giúp chúng ta có thể deploy PHP applications lên AWS Lambda.
Vậy thì Bref sẽ hỗ trợ chúng ta những gì ?</p>
<ul>
<li>PHP Runtimes cho AWS Lambda</li>
<li>Công cụ để Deploy lên aws lambda </li>
<li>Intergrate với các PHP Framework (vâng, chạy <code>Laravel</code> or <code>Symfony</code> trên AWS Lambda là hoàn toàn khả thi và đơn giản hơn trước nhiều)</li>
</ul>
<p>Bref sử dụng <strong>SAM</strong> để deploy serverless application. AWS đã có tài liệu rất rõ ràng về SAM ở đây.</p>
<h3>Bref hoạt động như thế nào</h3>
<p>Hai thành phần chính của Bref bao gồm Stacks và SAM</p>
<h4>Stacks</h4>
<p>Thật ra khi deploy một application thì sẽ có 1 cloudformation stack được tạo ra, bao gồm:</p>
<ul>
<li>lambda functions</li>
<li>S3 bucket</li>
<li>databases</li>
</ul>
<p>Mỗi khi các bạn deploy thì toàn bộ stacks sẽ được update và khi xoá stack thì toàn bộ các component của nó cũng sẽ bị xoá. Sạch và đẹp nhỉ </p>
<h4>SAM</h4>
<p>SAM cung cấp cho chúng ta một format config đơn giản để có thể deploy một serverless application dễ dàng hơn. (gọi là dễ dàng nhưng chắc cũng cần vài bước chứ không chỉ bằng một nút bấm được)
Deploying sử dụng SAM thì bao gồm 3 steps</p>
<ul>
<li>Upload code lên S3 bucket</li>
<li>Generate một file S3 Config template</li>
<li>Deploy Cloudformation stack</li>
</ul>
<h3>Deploy với SAM</h3>
<h4>Create deployment bucket</h4>
<p>Đầu tiên chúng ta cần tạo deployment bucket (bucket này sẽ được quản lý bởi SAM, do đó chúng ta không được upload các file khác vào trong bucket này )</p>
<pre><code>aws s3 mb s3://&lt;bucket-name&gt;</code></pre>
<h4>Create Deployment bucket</h4>
<p><a href="https://aws.amazon.com/blogs/aws/new-for-aws-lambda-use-any-programming-language-and-share-common-components/">Lambda Layer Release </a></p><?php $__env->stopSection(); ?>
<?php echo $__env->make('_layouts.post', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>