<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

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

    public function print($id)
    {
        $transaction = Transaction::with(['user', 'cart.product.category', 'shippingMethod'])->findOrFail($id);
        $pdf = Pdf::loadView('pdf.invoice', compact('transaction'));
        return $pdf->stream("invoice-{$transaction->id}.pdf");
    }

    public function index()
    {
        $transactions = Transaction::orderBy('id', 'desc')->get();
        return view('cms.transaction.index', compact('transactions'));
    }

    public function cancelInvoice($id)
    {
        $transaction = Transaction::where('id', $id)->where('status', 'Menunggu')->where('user_id', Auth::user()->id)->first();
        if ($transaction) {
            $transaction->status = 'Gagal';
            $transaction->save();
            Cart::where('transaction_id', $transaction->id)->delete();
            return redirect()->back()->with('success', 'Transaksi berhasil dibatalkan!');
        } else {
            return redirect()->back()->with('error', 'Transaksi tidak ditemukan!');
        }
    }

    public function cancelInvoiceAdmin($id)
    {
        $transaction = Transaction::where('id', $id)->where('status', 'Menunggu')->first();
        if ($transaction) {
            $transaction->status = 'Gagal';
            $transaction->save();
            Cart::where('transaction_id', $transaction->id)->delete();
            return redirect()->back()->with('success', 'Transaksi berhasil dibatalkan!');
        } else {
            return redirect()->back()->with('error', 'Transaksi tidak ditemukan!');
        }
    }

    public function addCart(Request $request)
    {
        $transaction = Transaction::where('user_id', Auth::user()->id)
            ->where('status', 'Menunggu')
            ->first();

        if ($transaction) {
            return redirect('/invoice/' . $transaction->id);
        }

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

    public function deleteCart($id)
    {
        $cart = Cart::where('id', $id)->first();
        if ($cart) {
            $cart->delete();
            return redirect()->back()->with('success', 'Produk berhasil dihapus dari keranjang!');
        } else {
            return redirect()->back()->with('error', 'Produk tidak ditemukan di keranjang!');
        }
    }

    public function checkout(Request $request)
    {
        $transaction = Transaction::where('user_id', Auth::user()->id)
            ->where('status', '!=', 'Berhasil')
            ->first();
        if (!$transaction) {
            return redirect('/cart')->with('error', 'Keranjang kosong!');
        }

        $transaction->status = 'Menunggu';
        $transaction->shipping_method_id = $request->shipping_method_id;
        $transaction->total = $request->total;

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.serverKey');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => $transaction->total,
            ),
            'customer_details' => array(
                'name' => Auth::user()->name,
                'email' => Auth::user()->email,
            )
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        $transaction->token = $snapToken;

        $transaction->save();

        return redirect('/invoice/' . $transaction->id);
    }


    public function invoice($id)
    {
        $transaction = Transaction::where('id', $id)->first();
        if (!$transaction) {
            return redirect('/');
        }
        return view('invoice', compact('transaction'));
    }

    public function process(Request $request)
    {
        if (Auth::user()) {
            $validasi = Transaction::with('users')->where('id_user', Auth::user()->id)->first();
            if ($validasi != null && $validasi->status == 'pending') {
                $validasi->delete();
            } else if ($validasi != null && $validasi->status == 'success') {
                return redirect('/');
            }
            $transaction = Transaction::create([
                'id_user' => Auth::user()->id,
                'status' => 'pending'
            ]);

            // Set your Merchant Server Key
            \Midtrans\Config::$serverKey = config('midtrans.serverKey');
            // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
            \Midtrans\Config::$isProduction = true;
            // Set sanitization on (default)
            \Midtrans\Config::$isSanitized = true;
            // Set 3DS transaction for credit card to true
            \Midtrans\Config::$is3ds = true;

            $params = array(
                'transaction_details' => array(
                    'order_id' => rand(),
                    'gross_amount' => 1,
                ),
                'customer_details' => array(
                    'name' => Auth::user()->name,
                    'email' => Auth::user()->email,
                )
            );

            $snapToken = \Midtrans\Snap::getSnapToken($params);

            $transaction->token = $snapToken;
            $transaction->save();
            return view('main.payment', ['transaction' => $transaction]);
        } else {
            return redirect('/');
        }
    }

    public function success($id)
    {
        $validasi = Transaction::where('id', $id)->first();
        if ($validasi) {
            $validasi->status = 'Berhasil';
            $validasi->save();
            return redirect('/invoice/' . $validasi->id);
        } else {
            return redirect('/');
        }
    }
}
