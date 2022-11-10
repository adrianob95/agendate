<?php

namespace App\Http\Controllers;

use App\Models\Agendamento;
use App\Http\Requests\StoreAgendamentoRequest;
use App\Http\Requests\UpdateAgendamentoRequest;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;

class AgendamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('agendamento.list', ['agendamentos' => Agendamento::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('agendamento.create', ['usuarios' => Usuario::all(), 'agendamentos' => Agendamento::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAgendamentoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAgendamentoRequest $request)
    {
        //
        $request->merge([
            'user_id' =>  Auth::id(),
        ]);
        if (Agendamento::create($request->all())) {

            return redirect()->route('agendamento.index')->with('success', 'Agendamento realizado com sucesso!');
        } else
            return redirect()
                ->back()
                ->withInput($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Agendamento  $agendamento
     * @return \Illuminate\Http\Response
     */
    public function show(Agendamento $agendamento)
    {
        $agendamento2 = $agendamento->with(['user', 'usuario'])->get();

        return view('agendamento.show', ['agendamento' => $agendamento2->find($agendamento), 'usuarios' => Usuario::all()]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Agendamento  $agendamento
     * @return \Illuminate\Http\Response
     */
    public function edit(Agendamento $agendamento)
    {
        $agendamento2 = $agendamento->with(['user', 'usuario'])->get();
      
        return view('agendamento.edit', ['agendamento' => $agendamento2->find($agendamento), 'usuarios' => Usuario::all()]);
  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAgendamentoRequest  $request
     * @param  \App\Models\Agendamento  $agendamento
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAgendamentoRequest $request, Agendamento $agendamento)
    {
        if ($agendamento->update($request->all())) {

            return redirect()->route('agendamento.index')->with('success', 'Agendamento atualizado com sucesso!');
        } else
            return redirect()
                ->back()
                ->withInput($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Agendamento  $agendamento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agendamento $agendamento)
    {
        if (Agendamento::destroy($agendamento->id))
            return redirect()->route('agendamento.index')->with('success', 'Agendamento excluido com sucesso!');
       
    }
}
