<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index(): object
    {
        $data = Product::all();
        return view('product', compact('data'));
    }

    public function detail(int $id): object
    {

        $products_details = Product::find($id);
        return view('detail', compact('products_details'));
    }

    public function search(Request $req): object
    {
        $search_result = Product::where('name', 'like', '%' . $req->input('query') . '%')->get();

        if (count($search_result) == 0) {
            echo "No record found";
            return redirect('/');
        } else {
            return view('search', compact('search_result'));
        }
    }

    public function add_to_cart(Request $req)
    {
        if ($req->session()->has('user')) {

            $cart = new Cart();
            $cart->user_id = $req->session()->get('user')['id'];
            $cart->product_id = $req->product_id;

            $cart->save();
            return redirect('/');
        } else
            return redirect('/index');
    }

    static public function cartItem()
    {
        if (Session()->has('user')) {
            $session_result = session()->get('user', 'id');
            $get_user_id = $session_result->id;
            return Cart::where('user_id', $get_user_id)->count();
        }
    }

    public function cartlist()
    {
        if (Session()->has('user')) {


            $userId = Session()->get('user')['id'];
            $products = DB::table('cart')
                ->join('products', 'cart.product_id', '=', 'products.id')
                ->where('cart.user_id', $userId)
                ->select('products.*', 'cart.id as cart_id')
                ->get();

            return view('cartlist', compact('products'));
        }
    }

    public function removeCart($id)
    {
        Cart::destroy($id);
        return redirect('cartlist');
    }

    public function orderNow()
    {
        if (Session()->has('user')) {

            $userId = Session()->get('user')['id'];
            $total =  DB::table('cart')
                ->join('products', 'cart.product_id', '=', 'products.id')
                ->where('cart.user_id', $userId)
                ->sum('products.price');

            return view('ordernow', compact('total'));
        }
    }

    public function orderPlace(Request $req)
    {
        if (Session()->has('user')) {
            $userId = Session()->get('user')['id'];
            $allCart = Cart::where('user_id', $userId)->get();
            foreach ($allCart as $cart) {
                $order = new Order();
                $order->product_id = $cart['product_id'];
                $order->user_id = $cart['user_id'];
                $order->status = "pending";
                $order->payment_method = $req->payment;
                $order->payment_status = "pending";
                $order->address = $req->address;
                $order->save();
                Cart::where('user_id', $userId)->delete();
            }

            return redirect('/');
        }
    }

    public function myOrder()
    {
        if (Session()->has('user')) {
            $userId = Session()->get('user')['id'];
            $orders = DB::table('orders')
                ->join('products', 'orders.product_id', '=', 'products.id')
                ->where('orders.user_id', $userId)
                ->get();

            return view('myorders', compact('orders'));
        }
    }
}
