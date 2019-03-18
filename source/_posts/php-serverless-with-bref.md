---
extends: _layouts.post
section: content
title: Bref.sh, một tools giúp chạy PHP trên AWS Lambda
date: 2019-03-04
tags: [php']
description: bref.sh a tools to run PHP on AWS Lambda
cover_image: /assets/img/post-cover-image-2.png
---

## Mở đầu
Hôm nay mình rất là hứng thú khi AWS bắt đầu roll out layer cho serverless. Tại sao vậy ? Bởi vì khi roll out layer cho serverless, chúng ta có thể chạy bất kì ngôn ngữ lập trình nào trên lambda service :) **Is it cool?**

Lambda với layer được giới thiệu vào cuối tháng 11/2018 bao gồm các feature như bên dưới 
    * **Lambda Layers**: một dịch vụ giúp chúng ta có thể chia sẻ những đoạn code common, hoặc runtime, hoặc data. Mỗi một layers, chúng ta có thể versioning chúng. Sẽ có một vài lợi ích khi sử dụng **Lambda Layers**:
        - Tách lớp
        - Giúp function code ít hơn, tập trung vào tính năng hơn 
        - Tăng tốc deployment (do các libraries cũng như runtime đã được deploy sẵn)
    * **Lambda Runtime API**: Đây là một bộ API do AWS cung cấp (Http API) để từng *custom layers* có thể nhận events từ Lambda và gửi response lại cho Lambda, nói cách khác để các layers trong Lambda tương tác với nhau, chúng ta có thể sử dụng Lambda Layers

## Bref là gì 

Bref là một bộ công cụ được cài đặt thông qua `Composer` (quá tuyệt vời), giúp chúng ta có thể deploy PHP applications lên AWS Lambda. 
Vậy thì Bref sẽ hỗ trợ chúng ta những gì ?
    * PHP Runtimes cho AWS Lambda
    * Công cụ để Deploy lên aws lambda 
    * Intergrate với các PHP Framework (vâng, chạy `Laravel` or `Symfony` trên AWS Lambda là hoàn toàn khả thi và đơn giản hơn trước nhiều)

Bref sử dụng **SAM** để deploy serverless application. AWS đã có tài liệu rất rõ ràng về SAM ở đây.

### Bref hoạt động như thế nào

Hai thành phần chính của Bref bao gồm Stacks và SAM

#### Stacks
Thật ra khi deploy một application thì sẽ có 1 cloudformation stack được tạo ra, bao gồm:
    * lambda functions
    * S3 bucket
    * databases

Mỗi khi các bạn deploy thì toàn bộ stacks sẽ được update và khi xoá stack thì toàn bộ các component của nó cũng sẽ bị xoá. Sạch và đẹp nhỉ 

#### SAM 
SAM cung cấp cho chúng ta một format config đơn giản để có thể deploy một serverless application dễ dàng hơn. (gọi là dễ dàng nhưng chắc cũng cần vài bước chứ không chỉ bằng một nút bấm được)
Deploying sử dụng SAM thì bao gồm 3 steps
    * Upload code lên S3 bucket
    * Generate một file S3 Config template
    * Deploy Cloudformation stack

### Deploy với SAM 

#### Create deployment bucket
Đầu tiên chúng ta cần tạo deployment bucket (bucket này sẽ được quản lý bởi SAM, do đó chúng ta không được upload các file khác vào trong bucket này )

```
aws s3 mb s3://<bucket-name>
```

#### Create Deployment bucket 



[Lambda Layer Release ][Lambda Layer]
[Lambda Layer]: https://aws.amazon.com/blogs/aws/new-for-aws-lambda-use-any-programming-language-and-share-common-components/

