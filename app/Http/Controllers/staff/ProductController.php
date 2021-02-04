<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Exception;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('backend.product.manage', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::select('id', 'name')->get();
        $categories = Category::where('root', '0')->get();
        return view('backend.product.create', compact('categories', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        dd($request->all());
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'slug' => 'required|unique:products',
            'category' => 'required',
            'model' => 'required',
            'buying_price' => 'required',
            'selling_price' => 'required',
            'quantity' => 'required',
            'sku_code' => 'required',
            'description' => 'required',
            'color' => 'required',
            'size' => 'required',
//            'thumbnail' => 'required',
            'status'=> 'required'
        ]);

        /*if($validator->fails())
            return response()->json(['error' => $validator->errors()]);
        else {
            return response()->json(['success' => 'porduct save success']);*/

            /*try {
               Product::create([
                    'name' => $request->name,
                    'slug' => $request->slug,
                    'category_id' => $request->category_id,
                    'brand_id' => $request->brand_id,
                    'model' => $request->model,
                    'buying_price' => $request->buying_price,
                    'selling_price' => $request->selling_price,
                    'special_price' => $request->special_price,
                    'special_price_from' => $request->special_price_from,
                    'special_price_to' => $request->special_price_to,
                    'quantity' => $request->quantity,
                    'sku_code' => $request->sku_code,
                    'color' => $request->color,
                    'size' => $request->size,
                    'warranty_duration' => $request->warranty_duration,
                    'warranty_condition' => $request->warranty_condition,
                    'description' => $request->description,
                    'thumbnail' => 'test.jpg',
                    'image_1' => 'test1.jpg',
                    'status' => $request->status,
                    'user' => auth()->id()
                ]);
            } catch (Exception $exception) {
            }*/


//        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
