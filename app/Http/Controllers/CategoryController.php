<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Category::latest('id')->paginate(5);
        return view('admin.categories.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'=>'required|max:255',
        ]);
        try {
           Category::query()->create($data);
           return redirect('categories')->with('success', true);
        } catch (\Throwable $th) {
            return back()->with('success',false)->with('errors', $th->getMessage());
        }
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
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $data = $request->validate([
            'name'=>'required|max:255',
        ]); 
        try {
           Category::query()->where('id',$category->id)->update($data);
            return redirect()->route('categories.index')->with('success', true);
            // dd($data);  
        } catch (\Throwable $th) {  
            //throw $th;
            return back()->with('success', false)->with('error', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        try {
            Category::query()
            ->where('id', $category->id)
            ->delete(); 
            return redirect()
            ->route('categories.index')
            ->with('success', true);
        } catch (\Throwable $th) {
            return back()->with('success', false)->with('errors', $th->getMessage());
        }
    }
}
