<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(){
        return view('categories.index',[
            'categories'=>Category::all()
        ]);
    }

    public function create(){ return view('categories.create'); }

    public function store(Request $r){
        $r->validate(['name'=>'required','type'=>'required']);
        Category::create($r->only('name','type'));
        return redirect()->route('categories.index');
    }

    public function edit(Category $category){
        return view('categories.edit',compact('category'));
    }

    public function update(Request $r, Category $category){
        $category->update($r->only('name','type'));
        return redirect()->route('categories.index');
    }

    public function destroy(Category $category){
        $category->delete();
        return back();
    }
}
