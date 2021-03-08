<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        $categories = Category::where('root', Category::categoryRoot)->get();
        //return $categories;

        return view('frontend.index', compact('categories'));
    }

    public function products($slug1, $slug2, $slug3 = null)
    {
        if ($slug3) {
            $category = Category::where('slug', $slug3)->pluck('id');

            $categories = Category::where('id', $category)->get();
            $products   = Product::where('category_id', $category)->active()->paginate(12);
            $brand      = $products->pluck('brand_id')->unique();
            $brands     = Brand::select('name', 'slug')->whereIn('id', $brand)->where('status', 'active')->get();
        } else {
            $category     = Category::where('slug', $slug2)->pluck('id');
            $categories   = Category::where('root', $category)->get();
            $category_ids = $categories->pluck('id');
            $products     = Product::whereIn('category_id', collect($category)->merge(collect($category_ids)))->active()->get();
            $brand        = $products->pluck('brand_id')->unique();
            $brands       = Brand::select('name', 'slug')->whereIn('id', $brand)->where('status', 'active')->get();
        }
        // return $slug3;
        return view('frontend.category', compact('products', 'brands', 'categories'));
    }
}
