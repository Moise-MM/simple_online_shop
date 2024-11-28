<?php

namespace App\Http\Controllers\admin;

use App\Models\Product;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AdminProductController extends Controller
{
    
    public function index(): View
    {
        $viewData = [];
        $viewData["title"] = "Admin Page - Products - Online Store";
        $viewData["products"] = Product::all();
        return view('admin.product.index')->with("viewData", $viewData);
    }


    public function create(): View
    {
        return view('admin.product.create');
    }


    public function store(Request $request): View
    {
        $validator = Validator::make($request->all(),[
            "name" => "required|max:255",
            "description" => "required",
            "price" => "required|numeric|gt:0",
            //'image' => 'image',
        ]);

        if($validator->fails())
        {
            return view('admin.product.partials._error_form',['errors' => $validator->errors()]);
        }

        Product::create($request->all());

        return view('admin.product.partials._success_message',['message' => "Product added"]);
    }
}
