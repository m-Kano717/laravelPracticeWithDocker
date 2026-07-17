<?php

namespace App\Services;

use App\Mail\checkMail;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserService {

    public function sendMail(string $mail) {
        $randNum = sprintf("%04d", random_int(0, 9999));
        session(["randNum" => $randNum]);
        session(["mail" => $mail]);
        $hid = 1;
        Mail::to($mail)->send(new checkMail($randNum));
        return $hid;
    }

    public function checkNum(int $num) {
        $randNum = session("randNum");
        if ($num == $randNum) {
            session()->forget("randNum");
            session(["mailFlag" => 1]);
            return true;
        }
        return false;
    }

    public function setUserInfo(array $userInfo) {
        $userInfo["mail"] = session("mail");
        return $userInfo;
    }

    public function createUser($userInfo): void {
        $userInfo["mail"] = session("mail");
        $userInfo["pass"] = Hash::make($userInfo["pass"]);

        User::create($userInfo);
    }

    public function deleteUser(): void {
        $name = session("name");
        $user = User::where("nick_name", $name)->first();
        $user->delete_flag = 1;

        $user->save();
    }

    public function loginCheck() {
        if (!session()->has("login")) {
            session()->forget("name");
            session(["login" => 1]);
            return true;
        } else {
            return false;
        }
    }

    public function getUserInfo(bool $return_flag, Array $requestInfo) {
        if ($return_flag) {
            $userInfo = $requestInfo;
        } else {
            $name = session("name");
            $userInfo = User::where("nick_name", $name)->first();
            
        }
        return $userInfo;
    }

    public function updateUserInfo(Array $userInfo): void{
        $userInfo["pass"] = Hash::make($userInfo["pass"]);

        $userName = session("name");
        $user = User::where("nick_name", $userName)->first();

        $user->update($userInfo);
        session()->forget("login");
    }

    public function showUserInfo(){
        $name = session("name");
        $userInfo = User::where("nick_name", $name)->first();
        return $userInfo;
    }
}
