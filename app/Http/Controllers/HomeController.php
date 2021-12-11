<?php

namespace App\Http\Controllers;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function changePassword()
    {
        return view('changePassword');
    } 

    public function storeNewPassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);
   
        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
        
        return redirect(route('home'))->with('success', 'Password changed successfully.');
    }

    public function index()
    {
        $categories = Category::all();
        return view('home', compact('categories'));
    }

    
}
