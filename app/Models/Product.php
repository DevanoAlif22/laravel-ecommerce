<?php

namespace App\Models;

use App\Models\Cart;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    // Nama tabel yang terkait dengan model ini. Secara default, Laravel akan mencari tabel dengan nama 'products' (plural dari nama model).
    protected $table = 'products';

    // Daftar kolom yang diizinkan untuk diisi (mass assignment).  Ini penting untuk keamanan.
    // Hanya kolom-kolom yang ada di array ini yang bisa diisi menggunakan method create() atau update().
    protected $fillable = [
        'name',
        'description',
        'image', // Path gambar
        'category_id',
        'price',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    // Relasi dengan model Cart. Ini mendefinisikan relasi "hasMany" (satu produk dapat dimiliki oleh banyak cart).
    public function cart()
    {
        return $this->hasMany(Cart::class, 'cart_id', 'id');
    }
}
