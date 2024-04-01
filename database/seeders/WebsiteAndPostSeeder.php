<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Website;
use App\Models\Post;

class WebsiteAndPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // nothing special to do for now
        Website::factory()->count(10)->create()->each(function ($website) {
            $website->posts()->saveMany(Post::factory()->count(10)->make());
        });
    }
}
