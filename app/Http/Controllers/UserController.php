<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\items;
use App\Mail\checkMail;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
class UserController extends Controller{

    public function registUser() {
        if (session()->has("mailFlag")) {
            return redirect("regist");
        }
        return view("User/registForm");
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
            return view("User/registForm", compact("hid"));
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
        return view("User/regist");
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

        return view("User/checkInfo", compact("userInfo"));
    }

    public function registComplete(Request $request) {
        $userInfo = $request->all();
        $userInfo["mail"] = session("mail");
        $userInfo["pass"] = Hash::make($userInfo["pass"]);

        User::create($userInfo);

        return redirect("User/compView");
    }

    public function compView() {
        return view("User/compView");
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
        return view("User/changeInfo", compact("userInfo"));
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

        return view("User/changeCheck", compact("userInfo"));
    }

    public function changeRegist(Request $request) {
        $userInfo = $request->all();
        $userInfo["pass"] = Hash::make($userInfo["pass"]);

        $userName = session("name");
        $user = User::where("nick_name", $userName)->first();

        $user->update($userInfo);

        return redirect("/userInfo");
    }

        public function userInfo() {
        $name = session("name");
        $userInfo = User::where("nick_name", $name)->first();
        return view("User/userInfo", ["userInfo" => $userInfo]);
    }
}