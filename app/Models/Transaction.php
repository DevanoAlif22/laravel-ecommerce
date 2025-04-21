<?php

namespace App\Models;

use App\Models\Cart;
use App\Models\User;
use App\Models\ShippingMethod;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transactions';

    protected $fillable = [
        'user_id',
        'shipping_method_id',
        'status',
        'payment',
        'total',
        'token',
        'method',
    ];

    protected $casts = [
        'user_id' => 'integer',
        'shipping_method_id' => 'integer',
        'payment' => 'decimal:2',
        'total' => 'decimal:2',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    public function transactions()
{
    return $this->hasMany(Transaction::class);
}




    public function shippingMethod()
    {
        return $this->belongsTo(ShippingMethod::class, 'shipping_method_id');
    }

    public function cart()
    {
        return $this->hasMany(Cart::class, 'transaction_id');
    }
}
