<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = [
            [
                "title" => "Post 1",
                "user_id" => 1,
                "body" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla euismod, nisl vitae aliq",
                'is_published' => 1,
                "created_at" => "2021-06-04 13:21:22",
                "updated_at" => "2021-06-04 13:21:22",
            ],
            [
                "title" => "Post 2",
                "user_id" => 2,
                "body" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla euismod, nisl vitae aliq",
                'is_published' => 1,
                "created_at" => "2021-06-04 13:21:22",
                "updated_at" => "2021-06-04 13:21:22",
            ]
        ];

        foreach ($posts as $key => $value) {
            Post::create($value);
        }
    }

}
