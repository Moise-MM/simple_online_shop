<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $total = 0;
        //represent the product in the cart 
        $productsInCart = [];
        ////represent the product in the session 
        //Retrieve products from session:
        $productsInSession = $request->session()->get("products");
        //Process products if they exist in the session:
        if ($productsInSession) {
            //It fetches the corresponding Product models from the database using their IDs.
            $productsInCart = Product::findMany(array_keys($productsInSession));
            //It calculates the total price based on the products and their quantities.
            $total = Product::sumPricesByQuantities($productsInCart, $productsInSession);
        }
        $viewData = [];
        $viewData["title"] = "Cart - Online Store";
        $viewData["hero_title"] = "Shopping Cart";
        $viewData["total"] = $total;
        $viewData["products"] = $productsInCart;
        return view('cart.index')->with("viewData", $viewData);
    }


    public function add(Request $request, $id)
    {
        ////represent the product in the session 
        //Retrieve products from session:
        $products = $request->session()->get("products");
        //
        $products[$id] = $request->input('quantity');
        //
        $request->session()->put('products', $products);
        //
        $viewData = [];
        $viewData['message'] = "Product added";
        //
        return view('cart.partials._success_message',[
            'viewData' => $viewData
        ]);
    }


    public function delete(Request $request)
    {
        $request->session()->forget('products');
        return back();
    }
}
