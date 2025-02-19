<?php

namespace App\Http\Controllers\admin;

use App\Models\Product;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Drivers\Gd\Driver;

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
        $viewData = [];
        $viewData["title"] = "Create product";
        $viewData["product"] = null;

        return view('admin.product.create', [
            'viewData' => $viewData
        ]);
    }


    public function store(Request $request): View
    {
        $validator = Product::validateData($request);

        if($validator->fails())
        {
            return view('admin.product.partials._error_form',['errors' => $validator->errors()]);
        }

        $data = $request->all();

        // check for file
        if ($request->hasFile('image')) {
            // Get the uploaded file
            $imageFile = $request->file('image');

            //
            $manager = new ImageManager(new Driver());

            //Generates a unique name for the image file by combining a unique hexadecimal string (generated by uniqid()
            //and converted to hex) with the original file's extension.
            $imageName = hexdec(uniqid()).'.'.$imageFile->getClientOriginalExtension();

            //Reads the uploaded image file into the image manager for further processing.
            $img = $manager->read($imageFile);

            $pathImage = 'products/'.$imageName;

            if (!Storage::disk('public')->exists('products')) {
                Storage::disk('public')->makeDirectory('products');
            }

            //Resizes the image to 300x300 pixels and saves it to the public/upload/logo/ directory with the generated filename.
            $img->resize(500,500)->save(storage_path('app/public/'.$pathImage));


            $data['image'] = $pathImage;

        }
        
        Product::create($data);

        return view('admin.product.partials._success_message',['message' => "Product added"]);
    }



    public function edit(Product $product): View
    {
        $viewData = [];
        $viewData["title"] = "Edit product";
        $viewData["product"] = $product;

        return view('admin.product.edit', [
            'viewData' => $viewData
        ]);
    }


    public function update(Request $request, Product $product)
    {

        $validator = Product::validateData($request);

        $data = $request->all();


        if($validator->fails())
        {
            return view('admin.product.partials._error_form',['errors' => $validator->errors()]);
        }

        
        // check for file
        if ($request->hasFile('image')) {
            // Delete the old image from storage
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }

            // Get the uploaded file
            $imageFile = $request->file('image');

            //
            $manager = new ImageManager(new Driver());

            //Generates a unique name for the image file by combining a unique hexadecimal string (generated by uniqid()
            //and converted to hex) with the original file's extension.
            $imageName = hexdec(uniqid()).'.'.$imageFile->getClientOriginalExtension();

            //Reads the uploaded image file into the image manager for further processing.
            $img = $manager->read($imageFile);

            $pathImage = 'products/'.$imageName;

            if (!Storage::disk('public')->exists('products')) {
                Storage::disk('public')->makeDirectory('products');
            }

            //Resizes the image to 300x300 pixels and saves it to the public/upload/logo/ directory with the generated filename.
            $img->resize(500,500)->save(storage_path('app/public/'.$pathImage));


            $data['image'] = $pathImage;

        }
        
        $product->update($data);

        return view('admin.product.partials._success_message',['message' => "Product Updated"]);
    }


    public function delete(Product $product): string
    {

         // If there is a image, delete it from storage
         if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();
        return '';
    }
}
