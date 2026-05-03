<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
Use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['id' => 1, 'content' => '商品のお届けについて'],
            ['id' => 2, 'content' => '商品の交換について'],
            ['id' => 3, 'content' => '商品トラブル'],
            ['id' => 4, 'content' => 'ショップへのお問い合わせ'],
            ['id' => 5, 'content' => 'その他'],
        ];
        foreach($categories as $category) {
            DB::table('categories')->updateOrInsert(
                ['id' => $category['id']],
                [
                    'content' => $category['content'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }
    }
}