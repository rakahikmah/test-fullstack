<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Categories;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        $categories = Categories::all();
        return view('product.create',compact('categories'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required',
            'name_product' => 'required|unique:products',
            'description' => 'required',
            'price' => 'required',
            'category_id' => 'required',
        ]);

        $title = time().'.'.request()->file->getClientOriginalExtension();
    
        $request->file->move(public_path('docs'), $title);

        $products = Product::create([
            'image_name' => $title,
            'name_product' => $request->name_product,
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category_id,
        ]);

        if ($products) {
            $data['success'] = true;
            $data['message'] = 'Success!';
        } else {
            $data['success'] = true;
            $data['message'] = 'Success!';
        }

        echo json_encode($data);

      
    }

}
