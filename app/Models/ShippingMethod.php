<?php

namespace App\Models;

use App\Models\Transaction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ShippingMethod extends Model
{
    use HasFactory;

    protected $table = 'shipping_methods';

    protected $fillable = [
        'name',
        'cost',
        'estimated',
    ];

    protected $casts = [
        'cost' => 'decimal:2',
    ];

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'transaction_id');
    }
}
