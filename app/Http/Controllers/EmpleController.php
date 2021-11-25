<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmpleController extends Controller
{
    public function index()
    {
        $empleados = DB::select('SELECT e.*, d.denominacion
                                   FROM emple e
                                   JOIN depart d
                                     ON depart_id = d.id');
        return view('emple.index', [
            'empleados' => $empleados,
        ]);
    }

    public function show($id)
    {
        $empleado = DB::select('SELECT e.*, d.denominacion
                                  FROM emple e
                                  JOIN depart d
                                    ON depart_id = d.id
                                 WHERE e.id = ?', [$id]);

        if (empty($empleado)) {
            return redirect('/emple')
                ->with('erroremple', 'El empleado no existe');
        }

        return view('emple.show', [
            'empleado' => $empleado,
        ]);
    }

    public function create()
    {

        $departamentos = DB::table('depart')->select('id', 'denominacion')->get();



        return view('emple.create', [
            'departamentos' => $departamentos,
        ]);
    }

    public function store()
    {
        $validados = $this->validar();

        DB::table('emple')->insert([
            'nombre' => $validados['nombre'],
            'fecha_alt' => $validados['fecha_alt'],
            'salario' => $validados['salario'],
            'depart_id' => $validados['departamento'],
        ]);

        return redirect('/emple')
            ->with('success', 'Empleado insertado con éxito.');
    }

    public function destroy($id)
    {
        $empleados = $this->findEmpleado($id);

        DB::delete('DELETE FROM emple WHERE id = ?', [$id]);

        return redirect()->back()
            ->with('success', 'Empleado borrado correctamente');
    }

    private function findEmpleado($id)
    {
        $empleados = DB::select('SELECT e.*, d.denominacion
                                   FROM emple e
                                   JOIN depart d
                                     ON depart_id = d.id
                                  WHERE e.id = ?', [$id]);

        abort_unless($empleados, 404);

        return $empleados[0];
    }

    private function validar()
    {
        $validados = request()->validate([
            'nombre' => 'required|max:255',
            'fecha_alt' => 'date|date_format:Y-m-d',
            'salario' => 'required|numeric|between:0,999999.99',
            'departamento' => 'required|exists:depart,id',
        ]);

        return $validados;
    }

}
