<?php $__env->startSection('content'); ?><p>Ok. Nói cho đơn giản thì tôi đang có một cái blog ở đây: <a href="https://nech.info">https://nech.info</a>
Nhưng nó chạy trên wordpress, mà wordpress thì kiểu gì cũng phải tốn một con server cho nó.
Nên mình đã chuyển qua dùng cái này</p>
<p><a href="https://jigsaw.tighten.co/">https://jigsaw.tighten.co/</a></p>
<h2>Đôi điều về jigsaw</h2>
<p>Jigsaw là một tools để generate html static pages, tạm dịch là trang tĩnh HTML, mà cái gì là static thì nhanh nhất rồi đấy.</p>
<h2>Cấu trúc server</h2>
<p>Trang web này mình tạo bao gồm các components sau:</p>
<ol>
<li>S3: tất cả những bài post này đều được viết dưới dạng markdown, và build thành static HTML rồi up lên S3</li>
<li>CloudFront: Dùng để cache resources vào các Edges để tăng tốc độ load trang </li>
<li>Goofys: Dùng để mount thư mục build lên S3</li>
</ol>
<p><img src="/assets/img/blog.khanh.page.png" alt="infrastructure" /></p>
<h2>Đôi điều suy nghĩ</h2>
<p>Mình luôn muốn làm một cái gì đó cho mọi người, ít nhất là có thể giúp họ trong việc cảm thấy được <strong>cảm hứng</strong>. Mình đã được rất nhiều những người xung quanh truyền cảm hứng, và bây giờ mình muốn <em>truyền lại một cho các bạn khác nữa</em></p><?php $__env->stopSection(); ?>
<?php echo $__env->make('_layouts.post', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>