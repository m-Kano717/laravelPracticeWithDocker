<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\checkMail;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Services\UserService;
use App\Http\Requests\UserInfoRequest;

class UserController extends Controller {

    protected UserService $userService;

    public function __construct(UserService $userService) {
        $this->userService = $userService;
    }

    public function registUser() {
        if (session()->has("mailFlag")) {
            return redirect("regist");
        }
        return view("User/registForm");
    }

    public function registCheck(Request $request) {

        $hid = $request->input("hid");

        if ($hid == 0) {
            $hid = $this->userService->sendMail($request->mail);
            return view("User/registForm", compact("hid"));
        }
        if ($hid == 1) {
            if ($this->userService->checkNum($request->num)) {
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
        return view("User/regist");
    }

    public function checkInfo(UserInfoRequest $request) {
        $userInfo = $request->validated();
        $userInfo = $this->userService->setUserInfo($userInfo);
        $request->flash();

        return view("User/checkInfo", compact("userInfo"));
    }

    public function registComplete(Request $request) {
        $userInfo = $request->all();
        $this->userService->createUser($userInfo);

        return redirect("/compView");
    }

    public function compView() {
        return view("User/compView");
    }

    public function deleteUser() {
        $this->userService->deleteUser();

        return redirect("/logOut");
    }

    public function changeInfo(Request $request) {
        if ($this->userService->loginCheck()) {
            return redirect("/");
        };
        if(isset($request->return_flag)){
            $return_flag = true;
        }else{
            $return_flag = false;
        };
        $requestInfo = $request->all();
        $userInfo = $this->userService->getUserInfo($return_flag, $requestInfo);
        
        return view("User/changeInfo", compact("userInfo"));
    }

    public function changeCheck(UserInfoRequest $request) {
        // dd(session()->all());

        $userInfo = $request->validated();


        return view("User/changeCheck", compact("userInfo"));
    }

    public function changeRegist(Request $request) {
        $userInfo = $request->all();
        $this->userService->updateUserInfo($userInfo);
        return redirect("/userInfo");
    }

    public function userInfo() {
        $userInfo = $this->userService->showUserInfo();
        return view("User/userInfo", ["userInfo" => $userInfo]);
    }
}
