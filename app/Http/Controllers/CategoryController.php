<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    public function category(Category $category){
        return view('posts', [
            'title'=>"Post By category : $category->name",
            'posts'=>$category->posts->load('user','category')
        ]);
    }

    public function categories(){
        return view('categories', [
            'title'=>'Post Category',
            'categories'=>Category::all()
        ]);
    }

}
