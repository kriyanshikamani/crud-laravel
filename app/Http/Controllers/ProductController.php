<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;

class ProductController extends Controller
{
    public function index()
    {
        return view("products.index" ,[
            'products' =>product::get(),
        ]);
    }
    public function create()
    {
        return view("products.create");
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'description' =>'required',
            'image' =>'required|mimes:jpeg,jpg,png|max:10000',
        ]);


        $imageName=time().' .' .$request->image->extension();
        $request->image->move(public_path('product_images'), $imageName);

        $product= new Product;
        $product->image=$imageName;
        $product->name=$request->name;
        $product->description=$request->description;

        $product->save();
        return back()->withSuccess('product saved successfully');
    }

    public function edit($id)
    {
        $product =Product::where('id', $id)->first();
        return view('products.edit',['product'=>$product]);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' =>'required',
            'image' =>'nullable|mimes:jpeg,jpg,png|max:10000',
        ]);

        $product = Product::where('id', $id)->first();
        if(isset($request->image)){
        $imageName=time().' .' .$request->image->extension();
        $request->image->move(public_path('product_images'), $imageName);
        $product->image=$imageName;
        }

        $product->name=$request->name;
        $product->description=$request->description;

        $product->save();
        return back()->withSuccess('product updated successfully');
    }

    public function destroy($id)
    {
       $product= Product::where('id', $id)->first();
       $product->delete();
        return back()->withSuccess('product deleted successfully');
    }


    public function createProduct()
    {
        return view('products.register');
    }
}
