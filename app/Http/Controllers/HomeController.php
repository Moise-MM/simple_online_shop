<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{

        
    /**
     * Display home page
     *
     * @return View
     */
    public function index(): View
    {
        $products = Product::orderBy('created_at','desc')->paginate(10);
        $viewData = [];
        $viewData["title"] = "Home Page - Online Store";
        $viewData['hero_title'] = "Everything You Need, All in One Place";
        $viewData['hero_description'] = "Whether you're upgrading your home or shopping for gifts,
                                         find everything you need right here.";
        $viewData['products'] = $products;
        return view('home.index', [
            'viewData' => $viewData
        ]);
    }


    
    /**
     * Display About page
     *
     * @return View
     */
    public function about():View
    {
        $viewData = [];
        $viewData['title'] = "About us - Online Shop";
        $viewData['subtitle'] = "About us";
        $viewData['description'] = "This is an about page ...";
        $viewData ['author'] = "Developed by: Moise-MM";

        return view('home.about', [
            'viewData' => $viewData
        ]);
    }
}
