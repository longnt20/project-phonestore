<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\VariantAttribute;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $allData = VariantAttribute::with('variant')
            ->get()
            ->groupBy('variant_id')
            ->map(function ($group) {
                return $group->first();
            })
            ->values();

        $page = request()->get('page', 1); // Lấy số trang hiện tại
        $perPage = 5; // Số mục trên mỗi trang
        $data = $allData->forPage($page, $perPage); // Cắt dữ liệu cho trang hiện tại

        $data = new \Illuminate\Pagination\LengthAwarePaginator(
            $data,
            $allData->count(),
            $perPage,
            $page,
            ['path' => request()->url(), 'query' => request()->query()]
        );

        return view('client.HomePage', compact('data'));
    }
    public function detail($id)
    {
        $product = VariantAttribute::with(['variant', 'attribute_value'])->findOrFail($id);
        return view('client.DetailProduct', compact('product'));
    }
}
