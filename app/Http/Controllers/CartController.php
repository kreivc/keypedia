<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    public function addToCart($id, Request $request){
        $cart = Cart::where('user_id',auth()->user()->id)->where('keyboard_id',$id)->first();
        if(!auth()){
            return redirect()->back()->withErrors('Please login first!')->withInput();
        }

        $data = $request->all();
        $validator = Validator::make($data,[
            'quantity' => 'required|integer',
        ]);
        if($validator->fails()){
            return redirect(route('createKeyboard'))->withErrors($validator)->withInput();
        }

 
        if($cart==NULL){
            $cart=Cart::create([
                'user_id' => auth()->user()->id,
                'keyboard_id' => $id,
                'quantity'=>  $request->quantity,
            ]);
        }else{
            $cart->quantity = $cart->quantity+ $request->quantity;
        }
        $cart->save();
        return view('userCart',compact('cart'));
    }
}
