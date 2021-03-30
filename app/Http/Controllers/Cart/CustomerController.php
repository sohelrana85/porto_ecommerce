<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use App\Mail\WelcomeMail;
use App\Models\Customer;
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
        // $customer = Customer::where('phone', $request->phone_email)->first();

        if (is_numeric($request->phone_email)) {
            $customer = Customer::where('phone', $request->phone_email)->first();
        } else {
            $customer = Customer::where('email', $request->phone_email)->first();
        }

        if ($customer) {
            if (password_verify($request->password, $customer->password)) {
                $request->session()->put('customer_id', $customer->id);
                $request->session()->put('customer_id', $customer->name);
                return redirect('/');
            } else {
                session()->flash('login_error', 'These Credentials do not match with records');
                return redirect()->back();
            }
        } else {
            session()->flash('login_error', 'These Credentials do not match with records');
            return redirect()->back();
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
        return view('frontend.cart.load_cart_item', compact('cart_items'));
    }
}
