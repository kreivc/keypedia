<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Category;
use App\Models\Keyboard;
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
        $validator = Validator::make($category, [
            'name' => 'required|string|unique:categories|max:255|min:5',
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $category = Category::find($id); 
        $category->name = $request->name;

        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = time().$image->getClientOriginalName();
            $image->storeAs('public/assets/', $imageName);
            $category->image = $imageName;
        }
        else{
            $category->image = $category->image;
        }

        $category->save();
        $categories = Category::all();
        return view('manageCategory', compact('categories'));
    }

    public function edit($id){
        $category = Category::find($id);
        return view('editCategory', compact('category'));
    }

    public function viewByCategory($id){
        $category = Category::find($id);
        $keyboards = Keyboard::where('category_id', $id)->simplePaginate(8);
        return view('viewByCategory', compact('keyboards', 'category'));
    }

    public function search(Request $request){
        $filter = $request->get('filter');
        $search = $request->input('search');
        $categoryId = $request->input('ctgId');
        if($filter == 'name'){
            $keyboards = Keyboard::where('name', 'like', '%'.$search.'%')->where('category_id', '=', $categoryId)->simplePaginate(8);
        }else{
            $keyboards = Keyboard::where('price', '=', $search)->where('category_id', '=', $categoryId)->simplePaginate(8);
        }

        $category = Category::find($categoryId);
        
        return view('viewByCategory', compact('keyboards', 'category'));
    }
}
