<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function acak()
    {
        $characters = 'abcdefghijklmnopqrstuvwxyz';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 8; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function index()
    {
        $transactions = Transaction::orderBy('id', 'desc')->get();
        return view('cms.transaction.index', compact('transactions'));
    }

    public function addCart(Request $request)
    {
        $validatedData = $request->validate([
            'product_id' => 'required|exists:products,id',
            'amount' => 'required|integer|min:1',
        ]);

        $product = Product::find($validatedData['product_id']);
        $totalPrice = $product->price * $validatedData['amount'];

        $transaction = Transaction::where('user_id', Auth::user()->id)
            ->where('status', '!=', 'Berhasil')
            ->first();
        if (!$transaction) {
            $transaction = Transaction::create([
                'user_id' => Auth::user()->id,
                'status' => 'Pending',
            ]);
        }

        $checkCart = Cart::where('transaction_id', $transaction->id)
            ->where('user_id', Auth::user()->id)
            ->where('product_id', $validatedData['product_id'])
            ->first();
        if ($checkCart) {
            // Jika produk sudah ada di keranjang, update jumlah dan total harga
            $checkCart->amount += $validatedData['amount'];
            $checkCart->total += $totalPrice;
            $checkCart->save();
        } else {
            // Jika produk belum ada di keranjang, buat entri baru
            Cart::create([
                'transaction_id' => $transaction->id,
                'product_id' => $validatedData['product_id'],
                'user_id' => Auth::user()->id,
                'amount' => $validatedData['amount'],
                'total' => $totalPrice,
            ]);
        }

        return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }
}
