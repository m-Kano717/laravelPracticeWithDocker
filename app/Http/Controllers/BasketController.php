<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\items;

class BasketController extends Controller {
    public function showBasket() {
        if (!session()->has("name")) {
            return redirect("/");
        }
        if (session()->has("basketItems")) {
            $items = session("basketItems", []);
            return view("Basket/itemBasket", ["items" => $items]);
        };

        return view("Basket/itemBasket");
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
        };
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
}
