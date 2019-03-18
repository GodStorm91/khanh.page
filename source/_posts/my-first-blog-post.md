---
extends: _layouts.post
section: content
title: Tôi đã start cái blog này như thế nào ?
date: 2019-03-01
tags: [php']
description: This is your first blog post.
cover_image: /assets/img/post-cover-image-2.png
---

Ok. Nói cho đơn giản thì tôi đang có một cái blog ở đây: https://nech.info
Nhưng nó chạy trên wordpress, mà wordpress thì kiểu gì cũng phải tốn một con server cho nó. 
Nên mình đã chuyển qua dùng cái này

https://jigsaw.tighten.co/

## Đôi điều về jigsaw

Jigsaw là một tools để generate html static pages, tạm dịch là trang tĩnh HTML, mà cái gì là static thì nhanh nhất rồi đấy.

## Cấu trúc server 

Trang web này mình tạo bao gồm các components sau:
1. S3: tất cả những bài post này đều được viết dưới dạng markdown, và build thành static HTML rồi up lên S3
2. CloudFront: Dùng để cache resources vào các Edges để tăng tốc độ load trang 
3. Goofys: Dùng để mount thư mục build lên S3

![infrastructure](/assets/img/blog.khanh.page.png)

## Đôi điều suy nghĩ 

Mình luôn muốn làm một cái gì đó cho mọi người, ít nhất là có thể giúp họ trong việc cảm thấy được **cảm hứng**. Mình đã được rất nhiều những người xung quanh truyền cảm hứng, và bây giờ mình muốn *truyền lại một cho các bạn khác nữa*
