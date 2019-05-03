---
extends: _layouts.master
title: PHP
---
section('body')

  include('_layouts.blog.list', ['blog' => $page->getPostsForTag($blog, $page->getFilename())])

endsection