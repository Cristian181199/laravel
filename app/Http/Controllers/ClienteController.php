<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('cliente.index', [
            'clientes' => Cliente::paginate(5),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cliente.create', [
            'cliente' => new Cliente(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validados = $this->validar();

        $cliente = new Cliente($validados);
        $cliente->save();

        return redirect('/clientes')
            ->with('success', 'Cliente insertado con exito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        return view('cliente.show', [
            'cliente' => Cliente::findOrFail($cliente->id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        return view('cliente.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
        $validados = $this->validar();
        $cliente = Cliente::findOrFail($cliente->id);
        $cliente->fill($validados);
        $cliente->save();

        return redirect('/clientes')
            ->with('success', 'Cliente modificado con exito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        $cliente = Cliente::findOrFail($cliente->id);

        if ($cliente->facturas->isNotEmpty()) {
            return redirect('/clientes')
                ->with('error', 'El cliente tiene facturas asociadas.');
        }

        $cliente->delete();

        return redirect('/clientes')
            ->with('success', 'Cliente borrado con exito.');
    }

    public function validar()
    {
        $validados = request()->validate([
            'dni' => 'required|regex:/^(\d{8})([A-Z])$/',
            'nombre' => 'required|max:255',
        ]);

        return $validados;
    }
}
