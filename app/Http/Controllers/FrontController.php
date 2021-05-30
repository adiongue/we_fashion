<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;

class FrontController extends Controller
{
    protected $paginate = 12;

    public function __construct()
    {
        view()->composer('partial.menu', function ($view) {
            $categories = Category::pluck('name', 'id')->all();
            $view->with('categories', $categories);
        });
    }

    public function index()
    {
        $count = Product::published()->count();
        $products = Product::published()->with('picture')->paginate($this->paginate);
        return view('front.index', ['products' => $products, 'count' => $count]);
    }

    public function show(int $id)
    {
        $product = Product::find($id);
        return view('front.show', ['product' => $product]);
    }

    public function showProductByCategory(int $id)
    {
        $category = Category::find($id);
        $count = $category->products()->published()->count();
        $products = $category->products()->published()->paginate($this->paginate);
        return view('front.category', ['products' => $products, 'category' => $category, 'count' => $count]);
    }

    public function showProductByDiscount()
    {
        $count = Product::published()->where('state', 'discount')->count();
        $products = Product::published()->where('state', 'discount')->with('picture')->paginate($this->paginate);
        return view('front.discount', ['products' => $products, 'count' => $count]);
    }
}
