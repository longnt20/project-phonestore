<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Product::latest('id')->paginate(5);
        return view('admin.products.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = Category::all();
        return view('admin.products.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $products = $request->validate([
            'name'=>'required|max:255',
            'category_id'=>'required',
            'is_active'=>Rule::in(0,1),
            'description'=>'nullable',
            'image'=>'nullable|image|max:2048',
        ]);
        try {
            if ($request->hasFile('image')) {
                $products['image'] = $request->file('image')->store('image', 'public');
            }
            Product::query()->create($products);
            return redirect('products')->with('success', true);
        } catch (\Throwable $th) {
            //throw $th;
            dd($th->getMessage());
            return back()->with('success', false)->with('error', $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $data = Category::all();
        return view('admin.products.show', compact('product','data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $data = Category::all();
        return view('admin.products.edit', compact('product','data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name'=>'required|max:255',
            'category_id'=>'required',
            'is_active'=>Rule::in(0,1),
            'description'=>'nullable',
            'image'=>'nullable|image|max:2048',
        ]);
        try {
            $data['is_active'] = isset($data['is_active']) ? $data['is_active']:0;
            if ($request->hasFile('image')) {
                $data['image'] = $request->file('image')->store('image', 'public');
            }
            // dd($data);
            $product->update($data);
            // dd($product);
            return redirect('products')->with('success', true);
        } catch (\Throwable $th) {
            //throw $th;
            dd($th->getMessage());
            return back()->with('success', false)->with('error', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        try {
            Product::query()
                ->where('id',$product->id)
                ->delete();
            return redirect()
                ->route('products.index')
                ->with('success', true);
        } catch (\Throwable $th) {
            //throw $th;
            return back()->with('success', false)->with('error', $th->getMessage());
        }
    }
}
