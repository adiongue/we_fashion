<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use Illuminate\Support\Facades\Cache;

class FrontController extends Controller
{
    protected $paginate = 5;

     public function __construct(){
        // méthode pour injecter des données à une vue partielle 
        view()->composer('partial.menu', function($view){
            // on récupère un tableau associatif ['id' => 1]
            $categories = Category::pluck('name', 'id')->all();
            // on passe les données à la vue
            $view->with('categories', $categories);
        });
    }

    public function index()
    {
        $path = request()->page?? 'home';
        $products = Cache::remember($path, 60*24, function(){
            return Product::published()->with('picture')->paginate($this->paginate);
        });
        return view('front.products', ['products' => $products]);
    }

    public function show(int $id)
    {
        $product = Product::find($id);
        return view('front.show', ['product' => $product]);
    }

    public function showProductByCategory(int $id) {
         $category = Category::find($id);
         $products = $category->products()->paginate($this->paginate);
         return view('front.category', ['products' => $products, 'category' => $category]);
    }

    public function showProductByDiscount() {
        $path = request()->page?? 'home';
        $products = Cache::remember($path, 60*24, function(){
            return Product::published()->where('state', 'discount')->with('picture')->paginate($this->paginate);
        });
        return view('front.index', ['products' => $products]);
    }
}
