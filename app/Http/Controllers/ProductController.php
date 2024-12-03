<?php

namespace App\Http\Controllers;

use App\Models\Attribute as ModelsAttribute;
use App\Models\AttributeValue;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\Variant;
use Attribute;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use League\CommonMark\Extension\Attributes\Node\Attributes;

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
        $attributes = ProductAttribute::with('values')->get();
        return view('admin.products.create', compact('data', 'attributes'));
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
            'images' => 'nullable|array',
            'images.*'=>'image|max:2048',
        ]);
        try {
            $imagePath = [];
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    // Kiểm tra tính hợp lệ của ảnh
                    if ($image->isValid()) {
                        // Lưu ảnh vào thư mục 'uploads'
                        $path = $image->store('image', 'public');
                        $imagePath[] =$path;
                        // Tùy chọn: Lưu đường dẫn vào database nếu cần
                    }
                }
            }
            $products['image']=json_encode($imagePath);
            $product = Product::query()->create($products);
            //Lưu biến thể
            foreach ($request->variants as $variantData) {
                $variant = Variant::create([
                    'product_id' =>$product->id,
                    'price' => $variantData['price'],
                    'quantity' => $variantData['quantity'],
                ]);
    
                // Gắn giá trị thuộc tính
                $variant->attributes()->sync($variantData['attribute_value_ids']);
            }
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
        $images = json_decode($product->image, true);
        return view('admin.products.show', compact('product','data','images'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $data = Category::all();
        $images = json_decode($product->image, true);
        return view('admin.products.edit', compact('product','data','images'));
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
