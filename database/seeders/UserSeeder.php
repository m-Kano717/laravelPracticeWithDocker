<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            "first_name" => "佐藤",
            "last_name" => "武",
            "pass" => Hash::make('1111'),
            "nick_name" => "さとし",
            "address1" => "東京都",
            "address2" => "港区",
            "address3" => "あいう",
            "address4" => "123",
            "birth_date" => "2000-01-01",
            "tel" => "01122223334",
            "mail" => "mail@testmail",
            "sex" => "1",
            "user_type" => "B",
            "delete_flag" => "0"
        ]);
    }
}
