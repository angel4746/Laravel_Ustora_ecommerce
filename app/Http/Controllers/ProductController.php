<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('backend.product.manage',compact('products'));
    }

    public function create(){
        return view('backend.product.add');
    }

    public function store(Request $request){
        $product = new Product();
        $product->title = $request->title;
        $product->desc  = $request->desc;
        $product->price = $request->price;

        $image   = $request->image;
        $imgName = $image->getClientOriginalName();
        $folder  = 'product-images/';

        $image->move($folder,$imgName);
        $product->image = $folder.$imgName;
        $product->save();
        return back()->with('msg','product Added Succesfully!');

    }

    public function destroy($x){
        $product = Product::find($x);
        if (file_exists($product->image)) {
            unlink($product->image);
        }
        $product->delete();
        return back()->with('msg','Product Deleted Succesfully!');

    }

    public function edit($id){
        $product = Product::find($id);
        
        return view('backend.product.edit',compact('product'));
    }

    public function update(Request $request , $id){
        $product = Product::find($id);
        $product->title = $request->title;
        $product->desc  = $request->desc;
        $product->price = $request->price;


        if ($request->image) {
            if (file_exists($product->image)) {
                unlink($product->image);
            }
            $image   = $request->image;
            $imgName = $image->getClientOriginalName();
            $folder  = 'product-images/';

            $image->move($folder,$imgName);
            $product->image = $folder.$imgName;
        }
        
        $product->save();
        return back()->with('msg','Product Updated Succesfully!'); 
    }
}
