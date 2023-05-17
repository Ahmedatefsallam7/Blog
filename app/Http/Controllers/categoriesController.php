<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Setting;
use Illuminate\Http\Request;

class categoriesController extends Controller
{
    protected $setting;
    function __construct(Setting $setting)
    {
        $this->setting=$setting;
        
    }
    function index()
    {
        $categories = Category::all();
        return view('categories.categories', compact('categories'));
    }
    function create()
    {
        $categories = Category::all();
        $this->authorize('viewAny', $this->setting);
        return view('categories.add', compact('categories'));
    }

    function store(Request $request)
    {
        $newCateg = Category::create($request->except('image'));



        if ($request->hasFile('image')) {
            $imgName = $request->file('image')->getClientOriginalName();
            $request->image->move(public_path('\images\category_imgs\\'), $imgName);

            $path = 'images\category_imgs\\';
            $newCateg->update(['image' =>  $path . $imgName]);
        }
        session()->flash('addCategory', 'Category Added Successfully');
        return to_route('allCategories');
    }

    function edit()
    {
        return 'edit';
    }
    function update(Request $request)
    {
        $newCateg =  Category::find($request->id);
        $newCateg->update($request->except('image'));
        if ($request->hasFile('image')) {
            $imgName = $request->file('image')->getClientOriginalName();
            $request->image->move(public_path('\images\category_imgs\\'), $imgName);

            $path = 'images\category_imgs\\';
            $newCateg->update(['image' =>  $path . $imgName]);
        }
        session()->flash('update', 'Category Updated Successfully');
        return to_route('allCategories');
    }
    function destroy(Request $request)
    {
        Category::where('parent', $request->id)->delete();
        Category::find($request->id)->delete();
        session()->flash('delete', 'Category Deleted Successfully');
        return to_route('allCategories');
    }
}
