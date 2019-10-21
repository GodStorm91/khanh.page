---
extends: _layouts.post
section: content
title: TIPS - How to install Apache 2.4.41 on Amazon Linux AMI
date: 2019-10-21
categories: [tips]
description: Apache 2.4.41 on Amaon Linux AMI
---

This guide will guide you needed steps to install Apache 2.4.41 on Amazon Linux AMI. Apache 2.4.41 has been released on 2019.08 but Amazon has not yet released the package to
Amazon Repositories, so we will have to install it from source.

## 1. Yum update

```bash
$ yum -y update
```

## 2. Install OpenSSL 1.1.1

### 2.1 Install perl-core and zlib-devel

```bash
$ yum -y install zlib-devel
$ yum -y install perl-core
```

### 2.2 Install OpenSSL from source

1. Download the package

```bash
$ cd /usr/local/src/
$ wget https://www.openssl.org/source/openssl-1.1.1c.tar.gz
```

2. Run these commands below to unzip, make and install the package

```bash
$ tar xzvf openssl-1.1.1c.tar.gz
$ cd openssl-1.1.1c
$ ./config --prefix=/usr/local/openssl-1.1.1c shared zlib
$ make depend
$ make
$ make test
$ make install
```

3. Set the path for OpenSSL

```bash
$ echo /usr/local/openssl-1.1.1c./lib > /etc/ld.so.conf.d/openssl1111.conf
$ ldconfig
```

## 3. Install prerequisite tools for Apache Httpd

Prerequisites tools : `pcre-devel` and `expat-devel`

```bash
$ yum -y install pcre-devel
$ yum -y install expat-devel
```

### Install APR

```bash
$ cd /usr/local/src/
$ wget http://ftp.jaist.ac.jp/pub/apache//apr/apr-1.7.0.tar.gz
$ tar xvzf apr-1.7.0.tar.gz
$ cd apr-1.7.0/
$ ./configure
$ make
$ make install
```

### Install APR Util

```bash
$ cd /usr/local/src/
$ wget http://ftp.jaist.ac.jp/pub/apache//apr/apr-util-1.6.1.tar.gz
$ tar xvzf apr-util-1.6.1.tar.gz
$ cd apr-util-1.6.1/
$ ./configure --with-apr=/usr/local/apr
$ make
$ make install
```

## 4. Install Apache 2.4.41

```bash
$ cd /usr/local/usr
$ wget http://ftp.jaist.ac.jp/pub/apache//httpd/httpd-2.4.41.tar.gz
```

Unzip the downloaded file and change to that directory

```bash
$ tar xvzf httpd-2.4.41.tar.gz
$ cd httpd-2.4.41
```

Config and build from source

```bash
./configure \
--enable-http2 \
--enable-ssl \
--with-ssl=/usr/local/openssl-1.1.1c \
--with-apr=/usr/local/apr \
--with-apr-util=/usr/local/apr \
--enable-so \
--enable-mods-shared=all \
--enable-mpms-shared=all

make
make install
```

We can check the server information by running:

```bash
$ /usr/local/apache2/bin/httpd -v
```

## 5. Thoughts

Apache 2.4.41 fixed some CVEs that has been noted from 2.4.39, so it is advised that you guys should update to this version asap.
