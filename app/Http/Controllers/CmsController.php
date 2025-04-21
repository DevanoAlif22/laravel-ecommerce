<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Http\Request;

class CmsController extends Controller
{
    public function dashboard()
    {

        $category = Category::count();
        $product = Product::count();
        $user = User::count();
        $transaction = Transaction::count();
        return view('cms.dashboard', compact(['category', 'product', 'user', 'transaction']));
    }
}
