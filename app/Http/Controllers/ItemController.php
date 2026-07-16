<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Services\ItemService;

class ItemController extends Controller {
    protected ItemService $itemService;

    public function __construct(ItemService $itemService) {
        $this->itemService = $itemService;
    }

    public function showItems() {
        $itemList = $this->itemService->getItemList();

        return view("Item/itemList", ["itemList" => $itemList]);
    }

    public function itemDetail(int $id) {
        $item = $this->itemService->getItemDetail($id);
        if (!$item) {
            return abort(404);
            // return "お探しの商品は見つかりませんでした。<br><a href='" . url('/') . "'>トップへ戻る</a>";
        }
        return view("Item/itemDetail", ["items" => $item]);
    }
}
