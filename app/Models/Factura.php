<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    use HasFactory;

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
<<<<<<< HEAD

=======
>>>>>>> 5c4f67f7ddb1893785b162e7675616c6f04a047e
    }

    public function lineas()
    {
        return $this->hasMany(Linea::class);
    }

<<<<<<< HEAD
=======
    // Repasar esta relacion
    public function articulos()
    {
        return $this->belongsToMany(Articulo::class, 'lineas')
            ->as('linea')
            ->withPivot(['id', 'cantidad', 'created_at', 'updated_at']);
    }
>>>>>>> 5c4f67f7ddb1893785b162e7675616c6f04a047e
}
