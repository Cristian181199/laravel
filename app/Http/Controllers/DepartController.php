<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepartController extends Controller
{
    public function index()
    {
        $ordenes = ['denominacion', 'localidad'];
        $orden = request()->query('orden') ?: 'denominacion';
        abort_unless(in_array($orden, $ordenes), 404);

        $departs = Departamento::orderBy($orden);

        if (($denominacion = request()->query('denominacion')) !== null) {
            $departs->where('denominacion', 'ilike', "%$denominacion%");
        }

        if (($localidad = request()->query('localidad')) !== null) {
            $departs->where('localidad', 'ilike', "%$localidad%");
        }

        request()->flash();

        $paginador = $departs->paginate(2);
        $paginador->appends(compact(
            'denominacion',
            'localidad',
            'orden'
        ));

        return view('depart.index', [
            'departamentos' => $paginador,
        ]);
    }

    public function create()
    {
        return view('depart.create');
    }

    public function store()
    {
        $validados = $this->validar();

        $departamento = new Departamento([
            'denominacion' => $validados['denominacion'],
            'localidad' => $validados['localidad']
        ]);
        $departamento->save();

        return redirect('/depart')
            ->with('success', 'Departamento insertado con éxito.');
    }

    public function edit($id)
    {
        $departamento = Departamento::findOrFail($id);

        return view('depart.edit', [
            'departamento' => $departamento,
        ]);
    }

    public function update($id)
    {
        $validados = $this->validar();
        $departamento = Departamento::findOrFail($id);

        $departamento->fill([
            'denominacion' => $validados['denominacion'],
            'localidad' => $validados['localidad']
        ]);
        $departamento->save();

        return redirect('/depart')
            ->with('success', 'Departamento modificado con éxito.');
    }

    public function show($id)
    {
        $departamento = Departamento::findOrFail($id);


        return view('depart.show', [
            'departamento' => $departamento,
        ]);
    }

    public function destroy($id)
    {
        $departamento = Departamento::findOrFail($id);


            if (Empleado::where('depart_id', $departamento->id)->doesntExists()) {
                return redirect()->back()
                    ->with('error', 'No se puede borrar el departamento por que tiene empleados.');
            } else {
                    $departamento->delete();

                return redirect()->back()
                    ->with('success', 'Departamento borrado correctamente');
            }
    }

    private function validar()
    {
        $validados = request()->validate([
            'denominacion' => 'required|max:255',
            'localidad' => 'required|max:255',
        ]);

        return $validados;
    }
}
