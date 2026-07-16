<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\items;
use App\Models\Order;
use App\Models\OrderItem;

class OrderController extends Controller
{

    public function orderRegist(Request $request)
    {
        if (!session()->has("basketItems")) {
            return redirect("/showBasket");
        }
        ;
        if (!isset($request->steps)) {
            $steps = 0;
        } else {
            $steps = $request->steps;
        }
        ;

        $userInfo = User::where("nick_name", session("name"))->first();
        if (isset($request->pay_method)) {
            $userInfo["pay_method"] = $request->pay_method;

        }
        session(["basketItems" => array_values(session("basketItems"))]);
        for ($i = 0; $i < count(session("basketItems")); $i++) {
            $userInfo->total_price += session("basketItems." . $i . ".total_price");
        }
        return view("orderRegist", compact("steps"), compact("userInfo"));
    }

    public function orderComplete(Request $request)
    {
        $name = User::where("nick_name", session("name"))->first();
        $orderInfo["user_id"] = $name->id;
        $orderInfo["derivery_address"] = $request->address1 . " " . $request->address2 . " " . $request->address3 . " " . $request->address4;
        $orderInfo["total"] = $request->total_price;
        $orderInfo["pay_method"] = $request->pay_method;
        Order::create($orderInfo);
        $orderId = Order::latest("id")->first();
        for ($i = 0; $i < count(session("basketItems")); $i++) {
            if(isset($orderId->id)){
                $item["order_id"] = $orderId->id;
            }else{
                $item["order_id"] = 1;
            }
            $item["item_id"] = session("basketItems." . $i . ".id");
            $item["item_num"] = session("basketItems." . $i . ".order");
            $item["price"] = session("basketItems." . $i . ".price");
            $item["sub_total"] = session("basketItems." . $i . ".total_price");
            $nStock = session("basketItems." . $i . ".stock") - $item["item_num"];
            items::where("id", $item["item_id"])->update([
                "stock" => $nStock
            ]);
            OrderItem::create($item);
        }
        
        session()->forget("basketItems");
        return redirect("/showOrderComplete");
    }

    public function showOrderComplete()
    {
        return view("orderComplete");
    }

    public function orderList()
    {
        if (!session()->has("name")) {
            return redirect("/");
        }
        $user = User::where("nick_name", session("name"))->first();
        $orders = Order::where("user_id", $user->id)->get();
        return view("orderList", compact("orders"));
    }

    public function orderDetail(int $i)
    {
        $user = User::where("nick_name", session("name"))->first();
        $orders = Order::where("user_id", $user->id)->get();
        $order = $orders[$i - 1];
        $orderItem = OrderItem::where("order_id", $order->id)->get();
        for ($y = 0; $y < count($orderItem); $y++) {
            $orderItem[$y]->item_id = items::where("id", $orderItem[$y]->item_id)->value("item_name");
        }
        $order->id = $i;
        return view("orderDetail", compact("order"), compact("orderItem"));
    }

}