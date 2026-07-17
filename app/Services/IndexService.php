<?php

namespace App\Services;

use App\Models\Item;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class IndexService {

    public function logIn(string $pass, string $mail) {
        $user = User::where("mail", $mail)->first();

        if ($user and $user->delete_flag == 0) {
            if (Hash::check($pass, $user->pass)) {
                session(["name" => $user->nick_name]);
                session(["type" => $user->user_type]);

                return true;
            }
        }
        return false;
    }

    public function getRandItems(){
        $randomItems = Item::with("categories")->inRandomOrder()->limit(3)->get();
        return $randomItems;
    }
}
