<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() : View
    {
        $categories = Category::query()
            ->where('active', true)
            ->with('products', function($query){
                $query->where('active', true);
            })
            ->orderBy('position')
            ->get(); 
        
        return view('web.home.index', ['categories' => $categories]);
    }
}
