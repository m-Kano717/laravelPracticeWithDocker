<?php

namespace App\Http\Controllers;

use App\Models\items;

class ItemController extends Controller
{

    public function showItems()
    {
        $itemList = items::with("categories")->get();

        return view("Item/itemList", ["itemList" => $itemList]);
    }

    public function itemDetail(int $id)
    {
        $item = items::with("categories")->find($id);
        if (!$item) {
            // return "お探しの商品は見つかりませんでした。<br><a href="url('/')"></a>";
            return "お探しの商品は見つかりませんでした。<br><a href='" . url('/') . "'>トップへ戻る</a>";
        }
        return view("Item/itemDetail", ["items" => $item]);
    }
}
