<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmpleController extends Controller
{
    public function index()
    {
        $empleados = Empleado::all();

        return view('emple.index', [
            'empleados' => $empleados,
        ]);
    }

    public function show($id)
    {

        $empleado = Empleado::findOrFail($id);

        return view('emple.show', [
            'empleado' => $empleado,
        ]);
    }

    public function create()
    {
        $departamentos = Departamento::all();

        return view('emple.create', [
            'departamentos' => $departamentos
        ]);
    }

    public function store()
    {
        $validados = $this->validar();

        DB::table('empleados')->insert([
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
        $empleado = Empleado::findOrFail($id);
        $empleado->delete();

        return redirect()->back()
            ->with('success', 'Empleado borrado correctamente');
    }

    public function edit($id)
    {
        $departamentos = Departamento::all();
        $empleado = Empleado::findOrFail($id);


        return view('emple.edit', [
            'empleado' => $empleado,
            'departamentos' => $departamentos,
        ]);
    }

    public function update($id)
    {
        $validados = $this->validar();
        $empleado = Empleado::findOrFail($id);

        DB::table('empleados')
            ->where('id', $id)
            ->update([
            'nombre' => $validados['nombre'],
            'fecha_alt' => $validados['fecha_alt'],
            'salario' => $validados['salario'],
            'depart_id' => $validados['departamento'],
        ]);

        return redirect('/emple')
            ->with('success', 'Empleado modificado con éxito.');
    }

    private function validar()
    {
        $validados = request()->validate([
            'nombre' => 'required|max:255',
            'fecha_alt' => 'date|date_format:d-m-Y',
            'salario' => 'required|numeric|between:0,999999.99',
            'departamento' => 'required|exists:depart,id',
        ]);

        return $validados;
    }

}
