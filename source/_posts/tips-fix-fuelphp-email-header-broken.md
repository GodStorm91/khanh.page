---
extends: _layouts.post
section: content
title: TIPS - How to fix header broken in FuelPHP
date: 2019-06-21
categories: [tips]
description: Valet Plus 
---

[FuelPHP](https://fuelphp.com) was a good framework from beginning. It was super easy, intuitivea and straightforward. Although it lacks some of must-have features such as : 
* Dependencies Injection
* Templating Engine

Then, come [Laravel](http://laravel.com) and other newer frameworks make `FuelPHP` become less attrative on GitHub
... So long for introducing part, let me introduce our problem. 

## 1. The problem

```
When I was using Fuelphp to send email via SES in Japanese the header is completely wrong. 
```

Here is the header:

```
From: hogehoge@mail.com
To: nukinuki@mail.com
Subject: 【Some subject】パスワー
Message-ID: <0100016b50670058-da13fc7f-cbf7-4fde-9083-b4faab1275f9-000000@email.amazonses.com>
Date: Thu, 13 Jun 2019 10:34:16 +0000
X-SES-Outgoing: 2019.06.13-54.240.8.90
Feedback-ID: 1.us-east-1.3cLUpO+HD0L+B+FopedfEoY28igDyGu4bMyBMMzGqdQ=:AmazonSES

 =?UTF-8?Q?=E3=83=89=E5=86=8D=E7=99=BB=E9=8C=B2=E3=81=AE=E3=81=94=E6=A1=88?=

 =?UTF-8?Q?=E5=86=85?=
MIME-Version: 1.0
Content-Type: text/plain; charset=utf-8
Content-Transfer-Encoding: 7bit
```

Of-course, the header is broken, and user can't see any of the contents 😭

## 2. The solution

After a little time googling, we found this [Link](http://watanabeyu.blogspot.com/2014/06/fuelphpses.html)
Ofcourse, this guy told us the fact that: `If your header is more than 18 bytes, your header will be broken and there is no way to fix this ?`

Are you fucking kidding me ??
Japanese email is `somewhat long and cumbersome`, so limit your header under 18 bytes (or 9 kanji characters) **is unacceptable**. I know what happen when I told my boss about this.
So I tried to figure out what is the real problem here :
* Header maybe encoded and encoded result is wrong.
* If we allow, encoding header, what should we do? 

### 2.1 The easy way 
Because of the encoding header configuration, things has been gone wrong, so the most intuitive way is to disable it.
```php
<?php

return array(
   //省略
    'defaults' => array(
        'encode_headers' => false,
    )
    //省略
);


```

### 2.2 The hard way 
Because encoding header setting need `mbstring` to be installed, we must have install `mbstring` first.


### Thoughts:
Don't have any special thoughts about this problem. I'm considering to move away from FuelPHP to another framework.







