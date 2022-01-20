<?php

namespace App\Models;

<<<<<<< HEAD
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Linea extends Model
{
    use HasFactory;
=======
use Illuminate\Database\Eloquent\Relations\Pivot;

class Linea extends Pivot
{
    public $table = 'lineas';

    public $incrementing = true;
>>>>>>> 5c4f67f7ddb1893785b162e7675616c6f04a047e

    public function factura()
    {
        return $this->belongsTo(Factura::class);
    }

    public function articulo()
    {
        return $this->belongsTo(Articulo::class);
    }
}
