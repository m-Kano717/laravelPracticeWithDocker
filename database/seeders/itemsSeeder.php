<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\items;
use App\Models\categories;

class itemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        categories::create([
            "categorie_name" => "Guiters"
        ]);
        
        categories::create([
            "categorie_name" => "Basses"
        ]);

        categories::create([
            "categorie_name" => "Goods"
        ]);



        items::create([
            "item_name" => "L2000",
            "categorie_id" => "2",
            "price" => "300000",
            "stock" => "2"
        ]);

        items::create([
            "item_name" => "Les-Paul Standard",
            "categorie_id" => "1",
            "price" => "330000",
            "stock" => "5"
        ]);

        items::create([
            "item_name" => "PRS-Standard PE",
            "categorie_id" => "1",
            "price" => "80000",
            "stock" => "8"
        ]);

        items::create([
            "item_name" => "Ibanez Gio",
            "categorie_id" => "2",
            "price" => "60000",
            "stock" => "7"
        ]);

        items::create([
            "item_name" => "Insturuments-Stand",
            "categorie_id" => "3",
            "price" => "3500",
            "stock" => "18"
        ]);

        items::create([
            "item_name" => "Picks",
            "categorie_id" => "3",
            "price" => "350",
            "stock" => "183"
        ]);
    }
}
