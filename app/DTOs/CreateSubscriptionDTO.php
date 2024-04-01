<?php

namespace App\DTOs;

class CreateSubscriptionDTO
{
    public function __construct(
        public int $userId,
        public int $websiteId)
    {
        //
    }
}
