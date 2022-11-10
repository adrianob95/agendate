<?php

namespace App\Http\Controllers;

use App\Models\Alistamento;
use App\Http\Requests\StoreAlistamentoRequest;
use App\Http\Requests\UpdateAlistamentoRequest;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;

class AlistamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('alistamento.list', ['alistamentos' => Alistamento::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('alistamento.create', ['usuarios' => Usuario::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAlistamentoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAlistamentoRequest $request)
    {
        //
        $request->merge([
            'user_id' =>  Auth::id(),
        ]);
        if (Alistamento::create($request->all())) {

            return redirect()->route('alistamento.index')->with('success', 'Alistamento registrado com sucesso!');
        } else
            return redirect()
                ->back()
                ->withInput($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Alistamento  $alistamento
     * @return \Illuminate\Http\Response
     */
    public function show(Alistamento $alistamento)
    {
        //
        $alistamento2 = $alistamento->with(['user', 'usuario'])->get();

        return view('alistamento.show', ['alistamento' => $alistamento2->find($alistamento), 'usuarios' => Usuario::all()]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Alistamento  $alistamento
     * @return \Illuminate\Http\Response
     */
    public function edit(Alistamento $alistamento)
    {
        //
        $alistamento2 = $alistamento->with(['user', 'usuario'])->get();

        return view('alistamento.edit', ['alistamento' => $alistamento2->find($alistamento), 'usuarios' => Usuario::all()]);
  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAlistamentoRequest  $request
     * @param  \App\Models\Alistamento  $alistamento
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAlistamentoRequest $request, Alistamento $alistamento)
    {
        //
        if ($alistamento->update($request->all())) {

            return redirect()->route('alistamento.index')->with('success', 'Alistamento atualizado com sucesso!');
        } else
            return redirect()
                ->back()
                ->withInput($request->all());

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alistamento  $alistamento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alistamento $alistamento)
    {
        //
        if (Alistamento::destroy($alistamento->id))
            return redirect()->route('alistamento.index')->with('success', 'Alistamento excluido com sucesso!');
       
    }
}
