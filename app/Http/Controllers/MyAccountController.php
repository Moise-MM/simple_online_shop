<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyAccountController extends Controller
{
    
        
    /**collects the orders based on the authenticated user id 
     * and displays the myaccount.orders view.
     *
     * @return void
     */
    public function orders()
    {
        $viewData = [];
        $viewData["title"] = "My Orders - Online Store";
        $viewData["hero_title"] = "My Orders";
        $viewData["orders"] = Order::with(['items.product'])->where('user_id', Auth::user()->id)->get();
        return view('myaccount.orders')->with("viewData", $viewData);
    }
}
