<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Services\BasketService;

class BasketController extends Controller {

    protected BasketService $basketService;

    public function __construct(BasketService $basketService) {
        $this->basketService = $basketService;
    }

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
        $id = $request->id;
        $item = $this->basketService->getItem($id);

        if (isset(session("basketItems")[$item->item_name]?->order)) {
            $order = session("basketItems")[$item->item_name]->order;
            $order = $this->basketService->addOrder($item->stock, $order);
        }else{
            $order = $this->basketService->createOrder($item->stock);
        };

        if($order < 1){
            return redirect("/showBasket")
                    ->withErrors(["order" => "在庫超過"])
                    ->withInput();
        };

        $items = session("basketItems", []);    
        $items = $this->basketService->addbasket($items, $item, $order);
        session(["basketItems" => $items]);

        return redirect("/showBasket");
    }

    public function basketAllDelete() {
        session()->forget("basketItems");
        return redirect("/showBasket");
    }

    public function itemDelete(Request $request) {
        $id = $request->id;
        $item = $this->basketService->getItem($id);
        $items = session("basketItems", []);
        $order = session("basketItems")[$item->item_name]->order;

        $items = $this->basketService->deleteItem($items, $item, $order);

        if ($items[$item->item_name]->order == 0) {
            session()->forget("basketItems." . $item->item_name);
            if (count(session('basketItems', [])) == 0) {
                session()->forget("basketItems");
            }
        } else {
            $items[$item->item_name] = $item;
            session(["basketItems" => $items]);
        }
        return redirect("/showBasket");
    }
}
