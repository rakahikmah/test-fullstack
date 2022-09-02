<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $product = Product::select('products.name_product','products.description','products.price','products.image_name','categories.name')
                    ->join('categories','categories.id','=','products.category_id')
                    ->paginate(4);
    
        return view('home',compact('product'));
    }
}
