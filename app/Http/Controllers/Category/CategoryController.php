<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(Category $category)
    {
        // dd($category->products);
        return view('product.index', 
            [
                'category' => $category,
                'products' => $category->products
            ]
            );
    }
}
