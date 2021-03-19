<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Darryldecode\Cart\Cart;
use GrahamCampbell\ResultType\Result;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // \Cart::clear();

        $cart_items = \Cart::getContent()->sort();
        return view('frontend.cart.index', compact('cart_items'));

        // return $cart_items;


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = Product::find($request->productId);

        if ($product->special_price != '' && $product->special_price != 0){
            if ($product->special_price_from <= date('Y-m-d') && date('Y-m-d') <= $product->special_price_to){
                $price = $product->special_price;
            } else {
                $price = $product->selling_price;
            }
        } else {
            $price = $product->selling_price;
        }


        \Cart::add(array(
                'id' => $product->id,
                'name' => $product->name,
                'price' => $price,
                'quantity' => 1,
                'attributes' => array(
                    'thumbnail' => $product->thumbnail,
                    'slug' => $product->slug,
                )
        ));
        return redirect()->back();
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
        //just totally replace the quantity instead of incrementing or decrementing
        \Cart::update($id, array(
            'quantity' => array(
                'relative' => false,
                'value' => $request->quantity,
            ),
          ));
          return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        \Cart::remove($id);
        return redirect()->back();
    }

    public function removeall()
    {
        \Cart::clear();
        return redirect()->back();
    }
}
