<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    public function addToCart($id, Request $request){
        if(!auth()){
            return redirect()->back()->withErrors('Please login first!')->withInput();
        }

        $data = $request->all();
        $validator = Validator::make($data,[
            'quantity' => 'required|integer',
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $cart = Cart::where('user_id', auth()->user()->id)->where('keyboard_id',$id)->first();
        if($cart==NULL){
            $cart=Cart::create([
                'user_id' => auth()->user()->id,
                'keyboard_id' => $id,
                'quantity'=>  $request->quantity,
            ]);
        }else{
            $cart->quantity = $cart->quantity+$request->quantity;
        }

        $cart->save();
        // dd($cart);

        $carts = Cart::where('user_id', auth()->user()->id)->get();
        echo $carts;
        return view('userCart',compact('carts'));
    }

    public function viewCart(){
        $carts = Cart::where('user_id', auth()->user()->id)->get();
        return view('userCart',compact('carts'));
    }
}
