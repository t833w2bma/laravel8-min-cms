<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // イベントを実行しないように修正
        \Event::fakeFor(function () {
            //50件登録するには次のようにします。
            Post::factory()->count(50)->create();
        });
    }
}
