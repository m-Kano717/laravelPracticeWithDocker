<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\OrderController;

Route::get("/", [PostController::class, "index"]);

Route::post("/formPractice", [PostController::class, "logOn"]);

Route::Get("/showTop", [PostController::class, "showTop"]);

Route::Get("/logOut", [PostController::class, "logOut"]);

Route::Get("/showItems", [PostController::class, "showItems"]);

Route::Get("/itemDetail/{id}", [PostController::class, "itemDetail"])->name("itemDetail");

Route::Get("/registUser", [PostController::class, "registUser"]);

Route::Post("/registCheck", [PostController::class, "registCheck"]);

// Route::Get("/registCheck", [PostController::class, "registCheck"]);

Route::match(["Post","Get"],"/regist", [PostController::class, "regist"]);

Route::match(["Post","Get"],"/checkInfo", [PostController::class, "checkInfo"]);

Route::Post("/registComplete", [PostController::class, "registComplete"]);

Route::Get("/compView", [PostController::class, "compView"]);

Route::Get("/showBasket", [PostController::class, "showBasket"]);

Route::Post("/addBasket", [PostController::class, "addBasket"]);

Route::Get("/basketAllDelete", [PostController::class, "basketAllDelete"]);

Route::Post("/itemDelete", [PostController::class, "itemDelete"]);

Route::Get("/userInfo", [PostController::class, "userInfo"]);

Route::Get("/deleteUser", [PostController::class, "deleteUser"]);

Route::match(["Post","Get"], "/changeInfo", [PostController::class, "changeInfo"]);

Route::match(["Post","Get"], "/changeCheck", [PostController::class, "changeCheck"]);

Route::Post("/changeRegist", [PostController::class, "changeRegist"]);

Route::match(["Get", "Post"], "/orderRegist", [OrderController::class, "orderRegist"]);

Route::Post("/orderComplete", [OrderController::class, "orderComplete"]);

Route::Get("/showOrderComplete", [OrderController::class, "showOrderComplete"]);

Route::Get("/orderList", [OrderController::class, "orderList"]);

Route::Get("/orderDetail/{i}", [OrderController::class, "orderDetail"]);

?>