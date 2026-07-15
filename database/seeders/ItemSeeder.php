<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Item::create([
            'item_name' => 'リンゴ',
            'categorie_id' => 1,
            'price' => 150,
            'description' => '青森県産の美味しいリンゴです。'
        ]);
    }
}
