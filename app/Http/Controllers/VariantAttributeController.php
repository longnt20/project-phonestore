<?php

namespace App\Http\Controllers;

use App\Models\VariantAttribute;
use Illuminate\Http\Request;

class VariantAttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = VariantAttribute::with(['variant','attribute_value'])->latest('id')->paginate(5);
        // dd($data);
        return view('admin.variants.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(VariantAttribute $variantattribute)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VariantAttribute $variantattribute)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, VariantAttribute $variantattribute)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VariantAttribute $variantattribute)
    {
        //
    }
}
