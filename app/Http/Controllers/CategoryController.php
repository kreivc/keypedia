<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('manageCategory', compact('categories'));
    }

    public function delete($id){
        $category = Category::find($id);
        Storage::delete($category->image);
        $category->delete();

        return redirect()->back();
    }

    public function update($id, Request $request){
        $category = $request->all();

        $validator = Validator::make($category,[
            
        ]);
    }
}
