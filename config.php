<?php

return [
    'baseUrl' => 'https://khanh.page.test',
    'production' => false,
    'siteName' => 'Khanh\'s Blog',
    'siteDescription' => 'To share is to learn',
    'siteAuthor' => 'Khanh Nguyen',

    // collections
    'collections' => [
        'posts' => [
            'author' => 'Khanh Nguyen', // Default author, if not provided in a post
            'sort' => '-date',
            'path' => 'blog/{filename}',
        ],
        'categories' => [
            'path' => '/blog/categories/{filename}',
            'posts' => function ($page, $allPosts) {
                return $allPosts->filter(function ($post) use ($page) {
                    return $post->categories ? in_array($page->getFilename(), $post->categories, true) : false;
                });
            },
        ],
        'blog' => [
          'path' => 'posts/{date|Y/m/d}/{filename}',
          'author' => 'Khanh Nguyen',
          'tags' => []
        ],
    ],

    // helpers
    'getDate' => function ($page) {
        return Datetime::createFromFormat('U', $page->date);
    },
    'getExcerpt' => function ($page, $length = 255) {
        $content = $page->excerpt ?? $page->getContent();
        $cleaned = strip_tags(
            preg_replace(['/<pre>[\w\W]*?<\/pre>/', '/<h\d>[\w\W]*?<\/h\d>/'], '', $content),
            '<code>'
        );

        $truncated = substr($cleaned, 0, $length);

        if (substr_count($truncated, '<code>') > substr_count($truncated, '</code>')) {
            $truncated .= '</code>';
        }

        return strlen($cleaned) > $length
            ? preg_replace('/\s+?(\S+)?$/', '', $truncated) . '...'
            : $cleaned;
    },
    'isActive' => function ($page, $path) {
        return ends_with(trimPath($page->getPath()), trimPath($path));
    },
    'getPostsByTag' => function ($page, $posts) {
        return $posts->filter(function ($post) use ($page) {
            return in_array($page->tag, $post->tags ?? []);
        });
    },
];
