<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Item;
use App\Models\Order;
use App\Models\OrderItem;

class OrderService {

    public function getSteps(Request $request) {
        if (!isset($request->steps)) {
            $steps = 0;
        } else {
            $steps = $request->steps;
        };
        return $steps;
    }

    public function getUserInfo() {
        $userInfo = User::where("nick_name", session("name"))->first();
        return $userInfo;
    }

    public function setUserInfo(User $userInfo, Request $request) {
        if (isset($request->pay_method)) {
            $userInfo->pay_method = $request->pay_method;
        };
        session(["basketItems" => array_values(session("basketItems"))]);
        for ($i = 0; $i < count(session("basketItems")); $i++) {
            $userInfo->total_price += session("basketItems." . $i . ".total_price");
        };
        return $userInfo;
    }

    public function createOrder(User $userInfo, Request $request) {
        $orderInfo["user_id"] = $userInfo->id;
        $orderInfo["derivery_address"] = $request->address1 . " " . $request->address2 . " " . $request->address3 . " " . $request->address4;
        $orderInfo["total"] = $request->total_price;
        $orderInfo["pay_method"] = $request->pay_method;
        Order::create($orderInfo);
        $orderId = Order::latest("id")->first();
        for ($i = 0; $i < count(session("basketItems")); $i++) {
            if (isset($orderId->id)) {
                $item["order_id"] = $orderId->id;
            } else {
                $item["order_id"] = 1;
            }
            $item["item_id"] = session("basketItems." . $i . ".id");
            $item["item_num"] = session("basketItems." . $i . ".order");
            $item["price"] = session("basketItems." . $i . ".price");
            $item["sub_total"] = session("basketItems." . $i . ".total_price");
            $nStock = session("basketItems." . $i . ".stock") - $item["item_num"];
            Item::where("id", $item["item_id"])->update([
                "stock" => $nStock
            ]);
            OrderItem::create($item);
        }

        session()->forget("basketItems");
    }

    public function getOrders(User $userInfo){
        $orders = Order::where("user_id", $userInfo->id)->get();
        return $orders;
    }

    public function setOrderItem($orders, int $i){
        $order = $orders[$i - 1];
        $orderItem = OrderItem::where("order_id", $order->id)->get();
        for ($y = 0; $y < count($orderItem); $y++) {
            $orderItem[$y]->item_id = Item::where("id", $orderItem[$y]->item_id)->value("item_name");
        };
        $order->id = $i;

        return [$order, $orderItem];
    }
}
