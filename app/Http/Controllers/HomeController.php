<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Product;
use App\Models\cart;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function redirect(){
        $usertype=Auth::user()->usertype;
        if($usertype=='1'){
            return view('admin.home');
        }
        else{
            return view('home.userpage');
        }
    }

    public function index(){
        $products = Product::all();
        return view('home.userpage', compact('products'));
    }

    public function add_cart(Request $request, $id){
        if(auth::id()){
            $user=Auth::user();

            $product=product::find($id);
            
            $cart= new cart;

            $cart->name = $user->name;
            $cart->email = $user->email;
            $cart->phone = $user->phone;
            $cart->address = $user->address;
            $cart->user_id = $user->id;

            $cart->product_name=$product->product;
            $cart->price=$product->price;
            $cart->product_id=$product->id;
            $cart->image=$product->image;
            $cart->quantity = $request->quantity;
            
            $cart->save();
            return redirect()->back();
            
        }
        else{
            return redirect('login');
        }
    }
}
