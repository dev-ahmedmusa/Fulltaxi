<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('Dashboard.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Dashboard.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    Category::create([
            'name' => $request->input('name'),
            'note' => $request->input('note'),
        ]);
   

        session()->flash('add');
        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $section = Category::findOrFail($request->id);
        $section->update([
            'name' => $request->input('name'),
            'note' => $request->input('note'),
        ]);
        session()->flash('edit');
        return redirect()->route('category.index');
    }


    public function destroy($request)
    {
        Category::findOrFail($request->id)->delete();
        session()->flash('delete');
        return redirect()->route('category.index');
    }
}
