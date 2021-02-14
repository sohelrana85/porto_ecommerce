<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Exception;
use Intervention\Image\ImageManagerStatic as image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$data = Product::paginate(5);
        $products = Product::Paginate(5);
        return view('backend.product.manage', compact('products'));
    }
    public function getData(Request $request)
    {
        $products = Product::Paginate(5);
        return view('backend.product.pdatatable', compact('products'));
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

        $validator = Validator::make($request->all(), [
            'name'          => 'required',
            'slug'          => 'required|unique:products',
            'category'      => 'required',
            'brand_id'      => 'required',
            'model'         => 'required',
            'buying_price'  => 'required',
            'selling_price' => 'required',
            'quantity'      => 'required',
            'sku_code'      => 'required',
            'description'   => 'required',
            'thumbnail'     => 'required',
            'status'        => 'required'
        ]);

        if ($validator->fails())
            return response()->json(['error' => $validator->errors()]);
        else {
            try {

                $thumbnail = $request->file('thumbnail');
                $thumname = $request->slug . "." . $thumbnail->getClientOriginalExtension();
                //$request->thumbnail->storeAs('product_photo/thumbnail', $thumname);
                Image::make($thumbnail)->resize(300, 300)->save(public_path('product_photo/images/') . $thumname);


                $images = $request->file('multiple_image');
                $i = 1;
                $fileName = [];
                foreach ($images as $image) {
                    $imgname = $request->slug . $i++ . "." . $image->getClientOriginalExtension();
                    Image::make($image)->resize(100, 100)->save(public_path('product_photo/images/') . $imgname);
                    array_push($fileName, $imgname);
                }

                $products = Product::create([
                    'name'                  => $request->name,
                    'slug'                  => $request->slug,
                    'category_id'           => $request->category,
                    'brand_id'              => $request->brand_id,
                    'model'                 => $request->model,
                    'buying_price'          => $request->buying_price,
                    'selling_price'         => $request->selling_price,
                    'special_price'         => $request->special_price,
                    'special_price_from'    => $request->special_price_from,
                    'special_price_to'      => $request->special_price_to,
                    'quantity'              => $request->quantity,
                    'sku_code'              => $request->sku_code,
                    'color'                 => $request->color ? json_encode($request->color) : '[]',
                    'size'                  => $request->size ? json_encode($request->size) : '[]',
                    'warranty_duration'     => $request->warranty_duration,
                    'warranty_condition'    => $request->warranty_condition,
                    'description'           => $request->description,
                    'thumbnail'             => $thumname,
                    'images'                => json_encode($fileName),
                    'status'                => $request->status,
                    'create_by'             => auth()->id()
                ]);
                return response()->json(['success' => 'Data added successfully']);
            } catch (Exception $exception) {
                return response()->json(['error' => $exception->getMessage()]);
            }
        }
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
        $brands = Brand::select('id', 'name')->get();
        $categories = Category::where('root', '0')->get();
        $product = Product::find($id);
        $color = json_decode($product->color);
        $size = json_decode($product->size);
        return view('backend.product.edit', compact('product', 'categories', 'brands', 'color', 'size'));
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
        // return Product::find($id)->delete();
    }
}
