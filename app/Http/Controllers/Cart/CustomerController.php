<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use App\Mail\WelcomeMail;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Wishlist;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CustomerController extends Controller
{
    public function login_form()
    {
        $cart_items = \Cart::getContent()->sort();
        return view('frontend.customer.login', compact('cart_items'));
    }

    public function login(Request $request)
    {

        $request->validate([
            'phone_email'    => is_numeric($request->phone_email) ? 'required|numeric|digits:11' : 'required|email:rfc,dns',
            'password' => 'required|min:6|max:20'
        ]);

        $customer = Customer::where('phone', $request->phone_email)->orWhere('email', $request->phone_email)->first();

        if ($customer) {
            if (password_verify($request->password, $customer->password)) {
                $request->session()->put('customer_id', $customer->id);
                $request->session()->put('customer_name', $customer->name);
                return redirect()->route('customer.myaccount');
            } else {
                session()->flash('login_error', 'These Credentials do not match with records');
                return redirect()->back();
            }
        }
    }

    public function register_form()
    {
        $cart_items = \Cart::getContent()->sort();
        return view('frontend.customer.register', compact('cart_items'));
    }

    public function register(Request $request)
    {
        // dd($request->check);
        $request->validate([
            'name'     => 'required|string|min:4|max:30|regex:/^[\pL\s\-]+$/u',
            'email'    => 'email:rfc,dns',
            'phone'    => 'required|numeric|unique:customers|digits:11',
            'password' => 'required|min:6|max:20'
        ]);
        try {
            $customer = Customer::create([
                'name'       => $request->name,
                'email'      => $request->email,
                'phone'      => $request->phone,
                'password'   => bcrypt($request->password),
                'offer_mail' => $request->check ? $request->check : 0,
            ]);
            $data = [
                'name' => $customer->name,
                'email' => $customer->email,
            ];

            // Mail::to($customer->email)->send(new WelcomeMail($data));

            session()->flash('type', 'success');
            session()->flash('message', 'Registration Success');
        } catch (Exception $e) {
            session()->flash('type', 'danger');
            session()->flash('message', $e->getmessage());
        }
        return redirect()->back();
    }

    public function logout()
    {
        session()->forget('customer_id');
        return redirect()->route('customer.login');
    }

    public function myaccount()
    {
        $cart_items = \Cart::getContent()->sort();
        return view('frontend.customer.myaccount', compact('cart_items'));
    }

    public function addtolist(Request $request)
    {
        if ($request->ajax()) {
            $product_id = $request->id;
            $customer_id = session('customer_id');
            if ($customer_id) {
                $customer_exist = Wishlist::where('customer_id', $customer_id)->first();
                if ($customer_exist) {
                    $product_id = Wishlist::where('product_id', $product_id)->first();
                    if ($product_id) {
                        return response()->json([
                            'status' => '2',
                            'message' => 'The product you added earlier',
                        ]);
                    } else {
                        Wishlist::create([
                            'customer_id' => session('customer_id'),
                            'product_id'  => $request->id,
                        ]);
                        return response()->json([
                            'status' => '1',
                            'message' => 'successfully Added in your Wish List',
                        ]);
                    }
                } else {
                    Wishlist::create([
                        'customer_id' => session('customer_id'),
                        'product_id'  => $request->id
                    ]);
                    return response()->json([
                        'status' => '1',
                        'message' => 'successfully Added in your Wish List'
                    ]);
                }
            } else {
                return response()->json([
                    'status' => '0',
                    'message' => 'Please login First',
                ]);
            }
        }
    }

    public function wishlist()
    {
        $cart_items = \Cart::getContent()->sort();
        $wishlist = Wishlist::where('customer_id', session('customer_id'))->pluck('product_id');
        $product = Product::wherein('id', $wishlist)->get(['id', 'name', 'slug', 'selling_price', 'special_price', 'special_price_from', 'special_price_to', 'thumbnail']);
        return view('frontend.customer.wishlist', compact('cart_items', 'product'));
    }

    public function add_wishlist_to_cart(Request $request)
    {
        if ($request->ajax()) {
            $product = Product::find($request->productId);

            if ($product->special_price != '' && $product->special_price != 0) {
                if ($product->special_price_from <= date('Y-m-d') && date('Y-m-d') <= $product->special_price_to) {
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
                    'slug' => $product->slug
                )
            ));
            return response()->json([
                'message' => 'Product added successfully'
            ]);
        }
    }

    public function clearwishlist(Request $request)
    {
        // dd($request->productId);
        return Wishlist::where([
            ['customer_id', session('customer_id')],
            ['product_id', $request->productId],
        ])->delete();
        // $product = Product::wherein('id', $wishlist)->get(['id', 'name', 'slug', 'selling_price', 'special_price', 'special_price_from', 'special_price_to', 'thumbnail']);
        // return view('frontend.customer.wishlist', compact('cart_items', 'product'));
    }

    public function load_wishlist_item(Request $request)
    {
        $wishlist = Wishlist::where('customer_id', session('customer_id'))->pluck('product_id');
        $product = Product::wherein('id', $wishlist)->get(['id', 'name', 'slug', 'selling_price', 'special_price', 'special_price_from', 'special_price_to', 'thumbnail']);
        return view('frontend.customer.reloadwishlist', compact('product'));
    }
}
