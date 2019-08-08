---
extends: _layouts.post
section: content
title: TIL - Rails server not start after turn off docker
date: 2019-08-08
categories: [til]
description: Rails, Docker 
---

Recently, I have a project which was build by 
* Docker
* Rails 
* Sidekiq (Job Scheduler)
* Redis (Cache server)
* MinIO (File storage)

We use `docker-compose up`, but sometimes after I turn off docker compose, I couldn't start the webserver process again, as the log below

```bash
web_1      | => Booting Puma
web_1      | => Rails 5.1.4 application starting in development
web_1      | => Run `rails server -h` for more startup options
web_1      | A server is already running. Check /app/tmp/pids/server.pid.
web_1      | Exiting
server_web_1 exited with code 1

```
I kill docker process by command line, and run `docker-compose up` again, but no hope.

## Problem:
Rails server can't not stop normally when we use `Ctrl+C` or `docker-compose down`, this problem should be fixed when we publish docker images or we have to manually remove the `pid` file that remained in the project folder : `<project_root>/tmp/pids/server.pid`

## Solution:
We have to removed the `server.pid` file and restart the webserver again.
With the recent update of docker, we have seen that this problem has been fixed in `2.1.0.0` (mine was `2.0.0.0`) as an issue here:
https://github.com/docker/compose/issues/1393


## Reference 

https://qiita.com/kmt/items/89c31d647bf42bf2300c
https://github.com/docker/compose/issues/1393