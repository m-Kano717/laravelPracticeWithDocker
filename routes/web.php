<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\UserController;

Route::get("/", [PostController::class, "index"]);

Route::post("/formPractice", [PostController::class, "logOn"]);

Route::Get("/showTop", [PostController::class, "showTop"]);

Route::Get("/logOut", [PostController::class, "logOut"]);

Route::Get("/showItems", [PostController::class, "showItems"]);

Route::Get("/itemDetail/{id}", [PostController::class, "itemDetail"])->name("itemDetail");

Route::Get("/registUser", [UserController::class, "registUser"]);

Route::Post("/registCheck", [UserController::class, "registCheck"]);

// Route::Get("/registCheck", [PostController::class, "registCheck"]);

Route::match(["Post","Get"],"/regist", [UserController::class, "regist"]);

Route::match(["Post","Get"],"/checkInfo", [UserController::class, "checkInfo"]);

Route::Post("/registComplete", [UserController::class, "registComplete"]);

Route::Get("/compView", [UserController::class, "compView"]);

Route::Get("/showBasket", [BasketController::class, "showBasket"]);

Route::Post("/addBasket", [BasketController::class, "addBasket"]);

Route::Get("/basketAllDelete", [BasketController::class, "basketAllDelete"]);

Route::Post("/itemDelete", [BasketController::class, "itemDelete"]);

Route::Get("/userInfo", [UserController::class, "userInfo"]);

Route::Get("/deleteUser", [UserController::class, "deleteUser"]);

Route::match(["Post","Get"], "/changeInfo", [UserController::class, "changeInfo"]);

Route::match(["Post","Get"], "/changeCheck", [UserController::class, "changeCheck"]);

Route::Post("/changeRegist", [UserController::class, "changeRegist"]);

Route::match(["Get", "Post"], "/orderRegist", [OrderController::class, "orderRegist"]);

Route::Post("/orderComplete", [OrderController::class, "orderComplete"]);

Route::Get("/showOrderComplete", [OrderController::class, "showOrderComplete"]);

Route::Get("/orderList", [OrderController::class, "orderList"]);

Route::Get("/orderDetail/{i}", [OrderController::class, "orderDetail"]);

?>