<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Item;
use App\Models\Category;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Category::firstOrCreate([
            "categorie_name" => "Guiters"
        ]);
        
        Category::firstOrCreate([
            "categorie_name" => "Basses"
        ]);

        Category::firstOrCreate([
            "categorie_name" => "Goods"
        ]);



        Item::firstOrCreate([
            "item_name" => "L2000",
            "categorie_id" => "2",
            "price" => "300000",
            "stock" => "2"
        ]);

        Item::firstOrCreate([
            "item_name" => "Les-Paul Standard",
            "categorie_id" => "1",
            "price" => "330000",
            "stock" => "5"
        ]);

        Item::firstOrCreate([
            "item_name" => "PRS-Standard PE",
            "categorie_id" => "1",
            "price" => "80000",
            "stock" => "8"
        ]);

        Item::firstOrCreate([
            "item_name" => "Ibanez Gio",
            "categorie_id" => "2",
            "price" => "60000",
            "stock" => "7"
        ]);

        Item::firstOrCreate([
            "item_name" => "Insturuments-Stand",
            "categorie_id" => "3",
            "price" => "3500",
            "stock" => "18"
        ]);

        Item::firstOrCreate([
            "item_name" => "Picks",
            "categorie_id" => "3",
            "price" => "350",
            "stock" => "183"
        ]);
    }
}
