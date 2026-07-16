<?php

namespace App\Services;

use App\Models\Item;

class ItemService{

    public function getItemList(){

        $itemList = Item::with("categories")->get();
        return $itemList;
    }

    public function getItemDetail(int $id){
        $item = Item::with("categories")->find($id);
        if (!$item) {
            return false;
        }
        return $item;
    }

}