---
extends: _layouts.post
section: content
title: TIL - Run multiple php-fpm instances on centos
date: 2019-12-23
categories: [til]
description: php-fpm, server, infrastructure
---

Working as an Infrastructure Engineer, I have to deal a lot with migration tasks. One of my most paintful experience is to using multiple versions of php on the same server.
Here is my notes when installing multiple php-fpm on the same servers 

For example when I install php-fpm-7.2 and php-fpm-7.1 on the same server, I always get this error when starting the two processes:


```
$ sudo /etc/init.d/php-fpm-7.2 start
$ sudo /etc/init.d/php-fpm-7.1 start
```
When running these two commands, I always got php-fpm-7.1 started, not php-fpm-7.2, so what is the problem ? 
Because these two processes used the same configurations file in `/etc/php-fpm.conf` so whether we started `php-fpm-7.1` or `php-fpm-7.2`, only one processes get called.
So what can you do in this situation ?
1. Rename the file in `/etc/php-fpm.conf` to something else
2. Enable custom config file in `/etc/sysconfig/php-fpm-7.2`. Below is the file's content :

```
  1 # Additional environment file for php-fpm
  2 # Uncomment below to use the php 7.2 specific configuration file
  3 OPTIONS="-y /etc/php-fpm-7.2.conf"
```

Just uncomment the third line, then everything is OK.
