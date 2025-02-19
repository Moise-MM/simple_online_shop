<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
        
    /**
     * display all products
     *
     * @return View
     */
    public function index(): View
    {
        $viewData = [];
        $viewData["title"] = "Products - Online Store";
        $viewData["subtitle"] = "List of products";
        $viewData["products"] = Product::paginate(10);
        return view('product.index',[
            'viewData' => $viewData
        ]);
    }

    
    /**
     * Display a single product
     *
     * @param Product $product 
     *
     * @return void
     */
    public function show(Product $product)
    {
        $viewData = [];
        $product = $product;
        $viewData["title"] = $product->name." - Online Store";
        $viewData["subtitle"] = $product->name." - Product information";
        $viewData["product"] = $product;
        return view('product.show',[
            'viewData' => $viewData
        ]);
    }
}
