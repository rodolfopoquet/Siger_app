<?php

namespace App\Http\Controllers;

use App\Equipamentos;
use Illuminate\Http\Request;

class EquipamentosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipamentos=Equipamentos::all();
        return view('equipamentos.index', compact('equipamentos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('equipamentos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validator(
            [
                'descricao' => 'required',
                'etiqueta'  => 'required',
            ]);
        Equipamentos::create($request->all());

   

            return redirect()->route('equipamentos.index')
                     ->with('success','Equipamento registrado com sucesso');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Equipamentos  $equipamentos
     * @return \Illuminate\Http\Response
     */
    public function show(Equipamentos $equipamentos)
    {
        return view ('equipamentos.show', compact('equipamentos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Equipamentos  $equipamentos
     * @return \Illuminate\Http\Response
     */
    public function edit(Equipamentos $equipamentos)
    {
        return view ('equipamentos.edit',compact('equipamentos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Equipamentos  $equipamentos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Equipamentos $equipamentos)
    {
        $request->validator(
            [
                'descricao' => 'required',
                'etiqueta'  => 'required',    
            ]);
        Equipamentos::update($request->all());
                        return redirect()->route('equipamentos.index')
                   ->with('success','Equipamento atualizado com sucesso');
     }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Equipamentos  $equipamentos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Equipamentos $equipamentos)
    {
        $equipamentos->delete(); 

        return redirect()->route('equipamentos.index')
                        ->with('success','Equipamento excluido com sucesso');
    }
}
