---
extends: _layouts.post
section: content
title: TIPS - How to install multiple PHP versions on Centos 7 and config PHP versions base on Directory
date: 2019-10-18
categories: [tips]
description: Multiple PHP versions on Centos7
---

This blog post guide you around installing multiple versions of PHP on Amazon Linux

## 1. Install Multiple Versions of PHP

1. Install PHP 5.6 and php56-fpm

```bash
$ sudo yum install php56 php56-fpm
```

2. Install PHP 7.1 and php71-fpm

```bash
$ sudo yum install php71 php71-fpm
```

## 2. Install Apache fcgi modules

1. Update your httpd first:

```bash
$ sudo yum update httpd
```

2.  Install fcgi modules

    1. The easy way:

    We just run this command

    ```bash
    $ sudo yum install mod_fcgid
    ```

    If your server can install the module as normal, then proceed to step 3. If not, you have to install `mod_fcgi` the hard way(from source).

    2.  The hard way:
        2.1 Download the latest tar ball from source

            $ cd /usr/local/src && wget http://ftp.jaist.ac.jp/pub/apache//httpd/mod_fcgid/mod_fcgid-2.3.9.tar.gz

        2.2 Unzip

            $ tar -xzvf mod_fcgid-2.3.9.tar.gz

        2.3 Build it

            $ cd mod_fcgid-2.3.9
            $ ./configure.apxs

        If you get some error like me, congratulation, we have to fix somethings.

        ```bash
        ./configure.apxs must be able to find apxs in your path, or the environment variable APXS must provide the full path of APXS,
        or you may specify it with: APXS=/path/to/apxs ./configure.apxs
        ```

        You can refer to this link to get the apsx [link]()

    3.  Config the build
        ```bash
        $ ./configure.apxs
        $ make
        $ make install
        ```
        You can check the result by calling phpinfo.

## 3. Config PHP-FPM listening ports

We have installed `php71-fpm` and `php56-fpm`, so the next step is to configure these tools to listen on different ports.
Firstly, we will make `php71-fpm` listens on some port like `9071` and `php56-fpm` listens on port `9056`.
We will edit the file `/etc/php-fpm-5.6.d/www.conf` and add the row below

```bash
listen = 127.0.0.1:9056
```

We have to rename the default php-fpm.conf file to another name (I don't know how to work around this problem yet.)

```bash
$ mv /etc/php-fpm.conf /etc/php-fpm.conf.backup
```

We then force these service to read from its own config file by uncomment these lines:

```bash
$ vim /etc/sysconfig/php-fpm-7.1
```

we uncomment this line `#OPTIONS="-y /etc/php-fpm-7.3.conf"`

The default listening ports is `9000` but it seems a little difficult to remember so I changed it to `9056`
We do the same thing for `php71-fpm` and make it listens to port `9071`.
Then we will start both service by the comment below:

```bash
$ /etc/init.d/php-fpm-5.6 start
$ /etc/init.d/php-fpm-7.1 start
```

Mutliple php versions help us to check the consistency of our application.
With the help of `php-fpm` we can test multiple versions on the same servers. My next post is showing how to use docker to complete this task and compare these two methods.
