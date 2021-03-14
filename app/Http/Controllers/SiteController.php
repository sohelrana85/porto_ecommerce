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

            $categories = Category::with('productCount')->where('id', $category)->get();
            $products   = Product::where('category_id', $category)->active()->paginate(12);
            $brand      = $products->pluck('brand_id')->unique();
            $brands     = Brand::with('countProducts')->select('name', 'slug')->whereIn('id', $brand)->where('status', 'active')->get();
        } else {
            $category     = Category::where('slug', $slug2)->pluck('id');
            $categories   = Category::with('productCount')->where('root', $category)->get();
            $category_ids = $categories->pluck('id');
            $products     = Product::whereIn('category_id', collect($category)->merge(collect($category_ids)))->active()->get();
            $brand        = $products->pluck('brand_id')->unique();
            $brands       = Brand::with('countProducts')->select('id', 'name', 'slug')->whereIn('id', $brand)->where('status', 'active')->get();
        }

        $featured = product::where('featured', 1)->active()->get();

        return view('frontend.products', compact('products', 'brands', 'categories', 'featured'));
    }

    public function product($slug)
    {
        $product = product::where('slug', $slug)->first();

        // related product sort
        $related_product = product::where('category_id', $product->category_id)->pluck('category_id')->unique();
        $relproducts = product::where('category_id', $related_product)->get()->random(8);

        // marge thumbnail and images
        $thumbnail = $product->thumbnail;
        $images = json_decode($product->images);
        $image2 = array_unshift($images, $thumbnail); //insert the thumbnail in the first position

        return view('frontend.product', compact('product', 'relproducts', 'images'));
    }

    public function productQuickview($slug)
    {
        $product = product::where('slug', $slug)->first();
        return view('frontend.ajax.productquickview', compact('product'));
    }
}
