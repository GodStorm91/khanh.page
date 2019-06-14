---
extends: _layouts.post
section: content
title: TIL - MongoDB with FuelPHP (PHP7.x)
date: 2019-03-19
categories: [til]
description: MongoDB 
---

Due to lack of keyboard and my own intend to write in English. 
From now on, all of my blog post will be written in English, but I will try to translate some of its content to Vietnamese to encourage reader from Vietnam 
(Of course I want to encourage Vietnamese reader to learn another )

## FuelPHP and MongoDB
### 1. The Story of PHP MongoDB Driver.
Yes, the FuelPHP core has a class support for MongoDB a long, long time ago.
We can find it here 
`fuel/core/classes/mongo/db.php`

But the problem is, MongoDB PHP Driver has been re-written. 
[Link](https://derickrethans.nl/new-drivers.html)
Denik Rethans has started to become a MongoDB PHP Driver maintainer around 2012, and he released it around the end of 2015 and this driver supported the newer PHP7.x 
You can read more about the story why he undertook this effort as well as the architect under the hood [here](https://derickrethans.nl/new-drivers-part2.html) . 

Now we move on to the next, integrate the new driver with the FuelPHP framework.
To integrate the framework with our current blogpost

```

```