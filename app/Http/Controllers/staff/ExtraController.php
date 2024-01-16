<?php

namespace App\Http\Controllers\staff;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ExtraController extends Controller
{
    public function getData(Request $request)
    {
        $products = Product::Paginate(5);

        dd($products);
        return view('backend.product.pdatatable', compact('products'));
    }

    public function featured(Request $request, $id)
    {
        if ($request->ajax()) {
            $product           = Product::find($id);
            $product->featured = $product->featured ? "0" : "1";
            $product->save();
            return response()->json(['success' => 'porduct updated successfully']);
        }
    }
}
