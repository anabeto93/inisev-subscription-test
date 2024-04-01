<?php

namespace App\DTOs;

class CreatePostDTO
{
    public function __construct(
        public int $websiteId,
        public string $title,
        public string $content)
    {
        //
    }
}
