<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\Item;

class BasketService{

    public function getItem(int $id){
        $item = Item::where("id", $id)->first();
        return $item;
    }

    public function addBasket(array $items, Item $item, int $order){
        $item->order = $order;
        $item["total_price"] = $item->price * $item->order;
        $items[$item->item_name] = $item;
        return $items;
    }

    public function addOrder(int $stock, int $order){
        $order += 1;
        if($order > $stock){
            $order = 0;
        }

        return $order;
    }

    public function createOrder(int $stock){
        $order = 1;
        if($order > $stock){
            $order = 0;
        }

        return $order;
    }

    public function deleteItem(array $items, Item $item, int $order){
        $order = $order - 1;
        $item["total_price"] = $item->price * $order;

        if ($order <= 0) {
            $item->order = 0;
            $items[$item->item_name] =$item;
            return $items;
        } else {
            $item->order = $order;
            $items[$item->item_name] = $item;
            return $items;
        }
    }

}