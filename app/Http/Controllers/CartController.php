<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return view('cart.partials._success_message', [
            'viewData' => $viewData
        ]);
    }


    public function delete(Request $request)
    {
        $request->session()->forget('products');
        return back();
    }

    public function purchase(Request $request)
    {
        ////represent the product in the session 
        //Retrieve products from session:
        $productsInSession = $request->session()->get("products");
        // check if the user has products in session. 
        if ($productsInSession) {
            // create an Order with the logged user id 
            $userId = Auth::user()->id;
            // We create this Order because we need to access the Order id to create items.
            $order = new Order();
            $order->user_id = $userId;
            $order->total = 0;
            $order->save();

            //purchase total of 0
            $total = 0;
            //
            $productsInCart = Product::findMany(array_keys($productsInSession));
            //we iterate through the productsInCart
            foreach ($productsInCart as $product) {
                //we create a new Item , set the corresponding quantity (based on the values stored in session), 
                //price , product id , and order id . We then save the item and update the total value.
                $quantity = $productsInSession[$product->id];
                $item = new Item();
                $item->quantity = $quantity;
                $item->price = $product->price;
                $item->product_id = $product->id;
                $item->order_id = $order->id;
                $item->save();
                $total = $total + ($product->price * $quantity);
            }
            // We update the order total and save it
            $order->total = $total;
            $order->save();

            // we calculate and set the new user’s balance .
            $newBalance = Auth::user()->balance - $total;
            Auth::user()->balance = $newBalance;
            Auth::user()->save();

            // We then remove the products in session
            $request->session()->forget('products');

            // show the cart.purchase view with the order
            $viewData = [];
            $viewData["title"] = "Purchase - Online Store";
            $viewData["hero_title"] = "Purchase Status";
            $viewData["order"] = $order;
            return view('cart.purchase')->with("viewData", $viewData);
        } else {
            //If there are no products in session, we redirect the user to the cart.index route. 
            return redirect()->route('cart.index');
        }
    }
}
