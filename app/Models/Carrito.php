<?php

namespace App\Models;

use App\Models\CarritoItem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Carrito extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
    ];

    // Relación con el usuario (un carrito pertenece a un usuario)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    // Relación con los items del carrito (un carrito tiene muchos items)
    public function items()
    {
        return $this->hasMany(CarritoItem::class);
    }
}
