<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    use HasFactory;

    public function lineas()
    {
<<<<<<< HEAD
        return $this->hasMany(Articulo::class);
=======
        return $this->hasMany(Linea::class);
    }

    public function facturas()
    {
        return $this->belongsToMany(Factura::class, 'lineas')
            ->as('linea')
            ->withPivot(['id', 'cantidad', 'created_at', 'updated_at']);
>>>>>>> 5c4f67f7ddb1893785b162e7675616c6f04a047e
    }
}
