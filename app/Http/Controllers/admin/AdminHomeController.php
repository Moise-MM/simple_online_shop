<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminHomeController extends Controller
{
    
    public function index(): View
    {
        $viewData = [];
        $viewData["title"] = "Admin - Online Shop";
        return view('admin.home.index')->with("viewData", $viewData);
    }

}
