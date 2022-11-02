<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Product;


class AdminController extends Controller
{
    public function view_category(){
        //getting all the categories from the table in the database
        $categories = category::all();
        //sending the variable to the view
        return view('admin.category', compact('categories'));
    }

    public function add_category(Request $request){
        $data=new category;

        $data->category=$request->name;

        $data->save();
        return redirect()->back()->with('message', 'Category added Successfully');
    }

    public function delete_category($id){
        $data=category::find($id);

        $data->delete();

        return redirect()->back()->with('message', 'Category delete Successfully');
    }

    public function view_product(){
        $categories = category::all();
        return view('admin.product', compact('categories'));
    }

    public function add_product(Request $request){
        $product = new product;

        $product->product=$request->product;
        $product->description=$request->description;
        
        $product->category=$request->category;
        $product->quantity=$request->quantity;
        $product->price=$request->price;
        $product->discount_price=$request->dis_price;

        //getting image and saving it
        $image=$request->image;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('product',$imagename);

        $product->image=$imagename;
        $product->save();
        return redirect()->back()->with('message', 'Product added Successfully');
    }

    public function show_product(){
        $products = product::all();
        return view('admin.show_product', compact('products'));
    }

    public function delete_product($id){
        $product=product::find($id);

        $product->delete();

        return redirect()->back()->with('message', 'product delete Successfully');
    }

    public function edit_product($id){
        
        $products=product::find($id);
        $categories = category::all();
        return view('admin.edit_product',compact('products', 'categories'));
        
        

        // $data;

        // return redirect()->back()->with('message', 'product delete Successfully');
    }

    public function update_product(Request $request , $id){
        $product=product::find($id);

        $product->product=$request->product;
        $product->description=$request->description;
        $product->category=$request->category;
        $product->quantity=$request->quantity;
        $product->price=$request->price;
        $product->discount_price=$request->dis_price;

        //getting image and saving it
        $image=$request->image;
        if($image){
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('product',$imagename);

            $product->image=$imagename;
        }
        $product->save();
        return redirect('show_product')->with('message', 'Product updated Successfully');
    }
}
