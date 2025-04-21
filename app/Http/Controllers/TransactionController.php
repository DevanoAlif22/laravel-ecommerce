<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Transaction;

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
}
