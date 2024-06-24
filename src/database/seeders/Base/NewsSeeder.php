<?php

namespace Database\Seeders\Base;

use App\Models\News;
use App\Models\NewsCategory;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        News::create([
            'title' => 'ミラクルプリン発売開始',
            'body' => '<p>こんにちは。</p><p>今までのプリンを超えた究極のプリン、ミラクルプリンを7/1から販売します。よろしくお願いします。</p>',
            'news_category_id' => 1,
        ]);
        News::create([
            'title' => 'ショートケーキ20円引き',
            'body' => '<p>こんにちは。</p><p>6/1から6/14までショートケーキが20円引きとなります。</p><p>この機会にぜひともお越しください。</p>',
            'news_category_id' => 2,
        ]);
        News::create([
            'title' => '臨時休業のお知らせ',
            'body' => '<p>こんにちは。</p><p>6/18に臨時休業をいたします。</p><p>ご迷惑をおかけしますがよろしくお願いします。</p>',
            'news_category_id' => 3,
        ]);
    }
}
