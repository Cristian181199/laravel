<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

<<<<<<< HEAD
=======
    protected $fillable = ['dni', 'nombre'];

>>>>>>> 5c4f67f7ddb1893785b162e7675616c6f04a047e
    public function facturas()
    {
        return $this->hasMany(Factura::class);
    }
<<<<<<< HEAD
=======

    // Esta relacion no la acabo de entender del todo
    public function lineas()
    {
        return $this->hasManyThrough(Linea::class, Factura::class);
    }
>>>>>>> 5c4f67f7ddb1893785b162e7675616c6f04a047e
}
