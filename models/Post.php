<?php

class Post
{

    public function __construct(
        public string $title,
        public string $content,
        public string $image
    )
    {
    }

}
if (!isset($GLOBALS['posts'])) {
    $GLOBALS['posts'] = [
        new Post('Post 1', 'Content 1', 'https://fastly.picsum.photos/id/123/300/200.jpg?hmac=kXYDwT491zyy8kdoIlZfMs-IUzLA5VTv6DKX2dq5MO0'),

    ];
}