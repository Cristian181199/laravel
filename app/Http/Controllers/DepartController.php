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
        $departamento = $this->findDepartamento($id);

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

    public function store()
    {

        $validados = request()->validate([
            'denominacion' => 'required|max:255',
            'localidad' => 'required|max:255',
        ]);

        DB::insert('INSERT INTO depart (denominacion, localidad) VALUES (?, ?)', 
                [$validados['denominacion'], 
                $validados['localidad'],]);
        
        return redirect('/depart')->with('success', 'El departamento se ha creado');
    }

    public function destroy($id)
    {
        $departamento = $this->findDepartamento($id);

        DB::delete('DELETE FROM depart WHERE id = ?', [$id]);

        return redirect()->back()->with('success', 'Departamento borrado correctamente');
    }

    public function edit($id)
    {
        $departamento = $this->findDepartamento($id);

        return view('depart.edit', [
            'departamento' => $departamento,
        ]);
    }

    public function update(Request $request, $id)
    {
        $validados = $request->validate([
            'denominacion' => 'required|max:255',
            'localidad' => 'required|max:255',
        ]);

        DB::update('UPDATE depart SET denominacion = ?, localidad = ? WHERE id = ?', 
                [$validados['denominacion'],
                $validados['localidad'],
                $id]);

        return redirect('/depart')->with('success', 'Departamento editado correctamente');
    }

    private function findDepartamento($id)
    {
        $departamentos = DB::select('SELECT * 
                                       FROM depart
                                      WHERE id = ?', [$id]);

        abort_unless($departamentos, 404);

        return $departamentos[0];
    }

}
