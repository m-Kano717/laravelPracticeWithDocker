<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\items;
use App\Mail\checkMail;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class PostController extends Controller
{
    public function index() {
        if (session()->has("name")) {
            return redirect("showTop");
        } else {
            return view("index");
        }
    }

    public function logOn(Request $request) {
        $request->validate([
            "mail" => "required",
            "pass" => "required"
        ]);

        $mail = $request->input("mail");
        $pass = $request->input("pass");
        $hitpost = User::where("mail", $mail)->first();
        if ($hitpost and $hitpost->delete_flag == 0) {
            if (Hash::check($pass, $hitpost->pass)) {
                session(["name" => $hitpost->nick_name]);
                session(["type" => $hitpost->user_type]);
                if (session()->has("login")) {
                    return redirect("changeInfo");
                } else {
                    return redirect("showTop");
                }
                ;
            } else {
                return back()
                    ->withErrors(["pass" => "メールアドレスかパスワードが違います"])
                    ->withInput();
            }
        } else {
            return back()
                ->withErrors(["mail" => "メールアドレスかパスワードが違います"])
                ->withInput();
        }


    }

    public function showTop() {
        $randomItems = items::with("categories")->inRandomOrder()->limit(3)->get();

        return view("top", ["randomItems" => $randomItems]);
    }

    public function logOut(Request $request) {
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect("showTop");
    }



    public function showItems() {
        $itemList = items::with("categories")->get();

        return view("itemList", ["itemList" => $itemList]);
    }

    public function itemDetail(int $id) {
        $item = items::with("categories")->find($id);
        if (!$item) {
            // return "お探しの商品は見つかりませんでした。<br><a href="url('/')"></a>";
            return "お探しの商品は見つかりませんでした。<br><a href='" . url('/') . "'>トップへ戻る</a>";
        }
        return view("itemDetail", ["items" => $item]);
    }
}
