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
            $products   = Product::where('category_id', $category)->active()->get();
            $brand      = $products->pluck('brand_id')->unique();
            $brands     = Brand::select('id', 'name', 'slug')
                ->whereIn('id', $brand)->where('status', 'active')
                ->get()
                ->map(function ($brand) use ($products) {
                    $brand->products = $products->where('brand_id', $brand->id);

                    return $brand;
                });
        } else {
            $category = Category::where('slug', $slug2)->pluck('id');
            $categories = Category::with('productCount')->where('root', $category)->get();
            $category_ids = $categories->pluck('id');
            $products     = Product::whereIn('category_id', collect($category)->merge(collect($category_ids)))
                ->active()->orderBy('id', 'Desc')->get();
            $brand        = $products->pluck('brand_id')->unique();
            // $brands       = Brand::with('countProducts')
            //     ->select('id', 'name', 'slug')
            //     ->whereIn('id', $brand)
            //     ->where('status', 'active')
            //     ->get();

            $brands       = Brand::select('id', 'name', 'slug')
                ->whereIn('id', $brand)
                ->where('status', 'active')
                ->get()
                ->map(function ($brand) use ($products) {
                    $brand->products = $products->where('brand_id', $brand->id);

                    return $brand;
                });
        }
        // return $brands;
        $featured = product::where('featured', 1)->active()->get();
        $topmenucat = Category::where('root', Category::categoryRoot)->get();

        return view('frontend.products', compact('brands', 'categories', 'featured'));
        // return view('frontend.products', compact('products', 'brands', 'categories', 'featured', 'topmenucat'));
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
        $product = Product::where('slug', $slug)->first();

        // marge thumbnail and images
        $thumbnail = $product->thumbnail;
        $images = json_decode($product->images);
        $image2 = array_unshift($images, $thumbnail); //insert the thumbnail in the first position

        return view('frontend.ajax.productquickview', compact('product', 'images'));
    }

    public function loadmore(Request $request)
    {

        if ($request->ajax()) {
            if ($request->id) {
                $loadproducts     = Product::where('id', '<', $request->id)->active()->orderBy('id', 'Desc')->limit(8)->get();
            } else {
                $loadproducts     = Product::active()->orderBy('id', 'Desc')->limit(16)->get();
            }
            return view('frontend.loadmoredata', compact('loadproducts'));
        }
    }
}