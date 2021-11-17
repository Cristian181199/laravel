<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepartController extends Controller
{
    public function index()
    {
        $departs = DB::select('SELECT * FROM depart');
        return view('depart.index', [
            'departamentos' => $departs,
        ]);
    }

    public function show($id)
    {
        $departamento = DB::select('SELECT * 
                                  FROM depart
                                 WHERE id = ?', [$id]);

        if (empty($departamento)) {
            return redirect('/depart')
                ->with('errordepart', 'El departamento no existe');
        }

        return view('emple.show', [
            'deaprtamento' => $departamento,
        ]);
    }

}
