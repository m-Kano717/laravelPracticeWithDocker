<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\OrderService;

class OrderController extends Controller {
    protected OrderService $orderService;

    public function __construct(OrderService $orderService) {
        $this->orderService = $orderService;
    }

    public function orderRegist(Request $request) {
        if (!session()->has("basketItems")) {
            return redirect("/showBasket");
        };

        $steps = $this->orderService->getSteps($request);

        $userInfo = $this->orderService->getUserInfo();

        $userInfo = $this->orderService->setUserInfo($userInfo, $request);

        return view("Order/orderRegist", compact("steps"), compact("userInfo"));
    }

    public function orderComplete(Request $request) {
        $userInfo = $this->orderService->getUserInfo();
        $this->orderService->createOrder($userInfo, $request);
        return redirect("/showOrderComplete");
    }

    public function showOrderComplete() {
        return view("Order/orderComplete");
    }

    public function orderList() {
        if (!session()->has("name")) {
            return redirect("/");
        };
        $userInfo = $this->orderService->getUserInfo();
        $orders = $this->orderService->getOrders($userInfo);
        return view("Order/orderList", compact("orders"));
    }

    public function orderDetail(int $i) {
        $userInfo = $this->orderService->getUserInfo();
        $orders = $this->orderService->getOrders($userInfo);
        
        [$order, $orderItem] = $this->orderService->setOrderItem($orders, $i);
        
        return view("Order/orderDetail", compact("order"), compact("orderItem"));
    }
}
