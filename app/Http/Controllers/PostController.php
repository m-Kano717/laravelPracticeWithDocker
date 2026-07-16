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

    public function userInfo() {
        $name = session("name");
        $userInfo = User::where("nick_name", $name)->first();
        return view("userInfo", ["userInfo" => $userInfo]);
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

    public function registUser() {
        if (session()->has("mailFlag")) {
            return redirect("regist");
        }
        return view("registForm");
    }

    public function registCheck(Request $request) {
        // $regNum = 0;
        // $randNum;
        // if(session()->has("mailFlag")){
        //     return redirect("regist");
        // }
        if ($request->input("hid") === "0") {
            // $regNum = 1;
            $randNum = sprintf("%04d", random_int(0, 9999));
            session(["randNum" => $randNum]);
            $mail = $request->input("mail");
            session(["mail" => $mail]);
            $hid = 1;
            Mail::to($mail)->send(new checkMail($randNum));
            return view("registForm", compact("hid"));
        } elseif ($request->input("hid") === "1") {
            $randNum = session("randNum");
            if ($request->num == $randNum) {
                session()->forget("randNum");
                session(["mailFlag" => 1]);
                return redirect("/regist");
            } else {
                return redirect("/registUser")
                    ->withErrors(["num" => "The Number is Wrong."])
                    ->withInput();
            }
        }
    }

    public function regist() {
        if (!session()->has("mailFlag")) {
            return redirect("registUser");
        }
        // session(["mail" => "mail@testmail"]);
        return view("regist");
    }

    public function checkInfo(Request $request) {
        $request->validate([
            "first_name" => "required|max:20",
            "last_name" => "required|max:20",
            "pass" => "required",
            "nick_name" => "required|max:50",
            "address1" => "required",
            "address2" => ["required", "max:20", "regex:/^[ぁ-んァ-ヶー一-龠]{2,8}$/u", "regex:/[市区町村]$/u"],
            "address3" => "required|max:100",
            "address4" => "required|max:100",
            "birth_date" => "required|date|before_or_equal:today",
            "sex" => "required",
            "tel" => ["required", "max:20", "regex:/^0\d{9,10}$/"],
            "user_type" => "required"
        ]);

        $userInfo = $request->all();
        $userInfo["mail"] = session("mail");

        $request->flash();

        return view("checkInfo", compact("userInfo"));
    }

    public function registComplete(Request $request) {
        $userInfo = $request->all();
        $userInfo["mail"] = session("mail");
        $userInfo["pass"] = Hash::make($userInfo["pass"]);

        User::create($userInfo);

        return redirect("compView");
    }

    public function compView() {
        return view("compView");
    }

    public function showBasket() {
        if (!session()->has("name")) {
            return redirect("/");
        }
        if (session()->has("basketItems")) {
            $items = session("basketItems", []);
            return view("itemBasket", ["items" => $items]);
        }
        ;

        return view("itemBasket");
    }

    public function addBasket(Request $request) {
        if (!session()->has("name")) {
            return redirect("/");
        }
        $item = items::where("id", $request->id)->first();
        if (!isset(session("basketItems")[$item->item_name]?->order)) {
            if ($item->stock < 1) {
                return redirect("/showBasket")
                    ->withErrors(["order" => "在庫超過"])
                    ->withInput();
            }
            $item->order = 1;
        } else {
            $order = session("basketItems")[$item->item_name]->order;
            $order = $order + 1;
            if ($item->stock < $order) {
                return redirect("/showBasket")
                    ->withErrors(["order" => "在庫超過"])
                    ->withInput();
            }
            $item->order = $order;
        }
        ;
        $item["total_price"] = $item->price * $item->order;
        $items = session("basketItems", []);
        $items[$item->item_name] = $item;
        session(["basketItems" => $items]);

        return redirect("/showBasket");
        // return session("basketItems")[$item->item_name];
    }

    public function basketAllDelete() {
        session()->forget("basketItems");
        return redirect("/showBasket");
    }

    public function itemDelete(Request $request) {
        $item = items::where("id", $request->id)->first();
        $order = session("basketItems")[$item->item_name]->order;
        $order = $order - 1;
        $item["total_price"] = $item->price * $order;
        if ($order <= 0) {
            session()->forget("basketItems." . $item->item_name);
            if (count(session('basketItems', [])) == 0) {
                session()->forget("basketItems");
            }
        } else {
            $item->order = $order;
            $items = session("basketItems", []);
            $items[$item->item_name] = $item;
            session(["basketItems" => $items]);
        }
        return redirect("/showBasket");
    }

    public function deleteUser() {
        $name = session("name");
        $user = User::where("nick_name", $name)->first();
        $user->delete_flag = 1;

        $user->save();

        return redirect("/logOut");
        // return $user;
    }

    public function changeInfo(Request $request) {
        // dd(session()->all());
        if (!session()->has("login")) {
            session()->forget("name");
            session(["login" => 1]);
            return redirect("/");
        }
        ;

        if (isset($request->return_flag)) {
            $userInfo = $request;
        } else {
            $name = session("name");
            $userInfo = User::where("nick_name", $name)->first();
        }
        ;
        return view("changeInfo", compact("userInfo"));
    }

    public function changeCheck(Request $request) {
        // dd(session()->all());
        $request->validate([
            "first_name" => "required|max:20",
            "last_name" => "required|max:20",
            "pass" => "required",
            "nick_name" => "required|max:50",
            "address1" => "required",
            "address2" => ["required", "max:20", "regex:/^[ぁ-んァ-ヶー一-龠]{2,8}$/u", "regex:/[市区町村]$/u"],
            "address3" => "required|max:100",
            "address4" => "required|max:100",
            "birth_date" => "required|date|before_or_equal:today",
            "sex" => "required",
            "tel" => ["required", "max:20", "regex:/^0\d{9,10}$/"],
            "user_type" => "required"
        ]);


        $userInfo = $request->all();
        session()->forget("login");

        return view("changeCheck", compact("userInfo"));
    }

    public function changeRegist(Request $request) {
        $userInfo = $request->all();
        $userInfo["pass"] = Hash::make($userInfo["pass"]);

        $userName = session("name");
        $user = User::where("nick_name", $userName)->first();

        $user->update($userInfo);

        return redirect("/userInfo");
    }

}
