<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\History;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{

    public function viewCart(){
        $carts = Cart::where('user_id', auth()->user()->id)->get();
        return view('userCart',compact('carts'));
    }

    public function addToCart($id, Request $request){
        if(!Auth::check()){
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


        if($cart==null){
            $cart=Cart::create([
                'user_id' => auth()->user()->id,
                'keyboard_id' => $id,
                'quantity'=>  $request->quantity,
            ]);
        }else{
            $cart->quantity = $cart->quantity+$request->quantity;
        }
        $cart->save();
        $carts = Cart::where('user_id', auth()->user()->id)->get();
        return redirect(route('userCart'))->with(compact('carts'))->with('success', 'Success add To Cart!');

    }

    public function updateCart($id, Request $request){
        $data = $request->all();
        $validator = Validator::make($data,[
            'quantity' => 'required|integer',
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $cart = Cart::where('id',$id)->where('user_id', auth()->user()->id)->first();
        if($request->quantity==0){
            $cartDelete = Cart::find($id);
            $cartDelete->delete();
        }else{
            $cart->quantity = $request->quantity;
        }
        $cart->save();
        $carts = Cart::where('user_id', auth()->user()->id)->get();
        return redirect(route('userCart'))->with(compact('carts'))->with('success', 'Success update cart!');
    }


    public function checkout(){
        $carts = Cart::where('user_id', auth()->user()->id)->get();
        if(count($carts)==0){
            return redirect(route('transactionHistory'))->withErrors("Failed Checkout Cart!")->withInput();
        }

        $history = History::create([
            'user_id' => auth()->user()->id,
            'transactionDate' => date('Y-m-d H:i:s'),
        ]);

        $history->save();
        foreach($carts as $cart){
            $transaction = Transaction::create([
                'history_id' => $history->id,
                'keyboard_id' => $cart->keyboard->id,
                'quantity' => $cart->quantity
            ]);
            $transaction->save();
        }

        $cartDelete = Cart::truncate();

        $histories = History::where('user_id',auth()->user()->id)->orderBy('transactionDate', "DESC")->get();
        return view('transactionHistory',compact('histories'));
    }

    public function viewHistory(){
        $histories = History::where('user_id',auth()->user()->id)->orderBy('transactionDate', "DESC")->get();
        return view('transactionHistory',compact('histories'));
    }

    public function viewDetailHistory($id){
        $history = History::where('id',$id)->where('user_id', auth()->user()->id)->first();
        $transactions = Transaction::where('history_id', $history->id)->get();
        return view('transactionDetail',compact('transactions','history'));
    }
}
