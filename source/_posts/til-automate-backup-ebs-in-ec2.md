---
extends: _layouts.post
section: content
title: TIL - Backup EC2 snapshot by using AWS DLM
date: 2019-09-05
categories: [til]
description: S3

---

## Preface
Today I have been working with AWS and some serious trouble has been occurred since 2019.08.24.
The AWS Data center has been outage for around 8 hours which brought all the servers in `ap-northeast-1` region down
(some what they referred as the temperature failure has been the main problem to this incident). 
And one of our servers has died forever (due to the underlying EBS has been in trouble and couldn't be restored)

## Workaround
Wow, trouble happened and we don't have any backup for that EBS (holy...)
and we don't have any backup, but luckily, we have 2 instances. And the remaining still working.

## Make the fix
Ofcourse the hotfix is :
* Create the new ebs from the remaining server snapshot
* Stop the error server, detach its ebs and attach a new one
* Restart the error server.
* Testing the new server 
* If everything is ok it will be attached to main ELB

## Root causes fix
The root cause is we don't have any or perform any backups. Although AWS has claimed there SLA is 99.99%
There should be at time where the 0.01% occurred.
So we intend to use AWS DLM to make the backup regularly and automatically.
You can read documents about AWS DLM here (Link)[https://docs.aws.amazon.com/dlm/latest/APIReference/Welcome.html].

## TLDR
If we don't backup our data regularly. We will have a lot of mess.
