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
        $departamento = $this->findDepart($id);

        //if (empty($departamento)) {
        //    return redirect('/depart')
        //        ->with('errordepart', 'El departamento no existe');
        //}

        return view('depart.show', [
            'departamento' => $departamento,
        ]);
    }

    public function create()
    {
        // Suponemos que todo esta bien
        return view('depart.create');
    }

    public function store(Request $request)
    {
        $departamentonuevo = DB::insert('insert into depart (denominacion, localidad) values (:denominacion, :localidad)', 
                                [':denominacion' => $request->denominacion, 
                                ':localidad' => $request->localidad]);
        
        return redirect('/depart')->with('success', 'El departamento se ha creado');
    }

    public function destroy($id)
    {
        $departamento = $this->findDepart($id);

        DB::delete('DELETE FROM depart WHERE id = ?', [$id]);

        return redirect()->back()->with('success', 'Departamento borrado correctamente');
    }

    private function findDepart($id)
    {
        $departamentos = DB::select('SELECT * 
                                       FROM depart
                                      WHERE id = ?', [$id]);

        abort_unless($departamentos, 404);

        return $departamentos[0];
    }

}
