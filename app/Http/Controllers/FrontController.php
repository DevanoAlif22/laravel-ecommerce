<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function home()
    {
        $products = Product::orderBy('id', 'desc')->take(4)->get();
        return view('home', compact('products'));
    }

    public function index()
    {
        $products = Product::orderBy('id', 'desc')->get();
        $categories = Category::orderBy('id', 'desc')->get();
        return view('products', compact('products', 'categories'));
    }

    public function productCategory($id)
    {
        $products = Product::where('category_id', $id)->orderBy('id', 'desc')->get();
        $categories = Category::orderBy('id', 'desc')->get();
        return view('products', compact('products', 'categories'));
    }

    public function searchProduct(Request $request)
    {
        $search = $request->search;
        $products = Product::where('name', 'like', '%' . $search . '%')->orderBy('id', 'desc')->get();
        $categories = Category::orderBy('id', 'desc')->get();
        return view('products', compact('products', 'categories'));
    }

    public function detailProduct($id)
    {
        $product = Product::where('id', $id)->first();
        if (!$product) {
            return redirect('/')->with('error', 'Product not found');
        }
        $products = Product::orderBy('id', 'desc')->take(4)->get();
        return view('detailProduct', compact('product', 'products'));
    }
    public function baskets()
    {

        return view('baskets');
    }
    public function login()
    {

        return view('auth.login');
    }
    public function register()
    {

        return view('auth.register');
    }
}
