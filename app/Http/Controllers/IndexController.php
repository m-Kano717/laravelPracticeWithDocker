<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller {

    protected IndexService $indexService;

    public function __construct(IndexService $indexService) {
        $this->indexService = $indexService;
    }

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

        $doLogin = $this->indexService->logIn($request->pass, $request->mail);

        if ($doLogin) {
            if (session()->has("login")) {
                return redirect("changeInfo");
            }
            return redirect("showTop");
        } else {
            return back()
                ->withErrors(["mes" => "メールアドレスかパスワードが違います"])
                ->withInput();
        }
    }

    public function showTop() {
        $randomItems = $this->indexService->getRandItems();

        return view("top", ["randomItems" => $randomItems]);
    }

    public function logOut(Request $request) {
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect("showTop");
    }
}
