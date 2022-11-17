@extends('layouts.template')

@section('title', config('app.name')." - Cadastrar Usuario")
@section('pagina', 'Cadastrar Usuario')
@section('pagina2', 'Cadastrar Usuario')
@section('content')
<div style="text-align:center; align-items: center; margin-top: 2em; margin-bottom: 13em; height: 7em;">
    <a href="{{route('atendimento.create')}}"><button type="button" class="btn btn-success btn-lg fleft">Atendimento Gabinete</button></a>
    <a href="{{route('alistamento.create')}}"><button type="button" class="btn btn-secondary btn-lg fleft a">Alistamento Eleitoral</button></a>
    <a href="{{route('agendamento.create')}}"><button type="button" class="btn btn-success btn-lg fleft">Agendar atendimento</button></a>
    <a disabled="disabled" style=" pointer-events: none;" href="{{route('usuario.index')}}"><button type="button" disabled class="btn btn-success btn-lg fleft a">Agendar documento</button></a>

    <a   href="{{route('requisicao.create')}}"><button type="button"  class="btn btn-success btn-lg fleft">Exames</button></a>
    <a  href="{{route('listas.create')}}"><button type="button" class="btn btn-success btn-lg fleft a">Cestas</button></a>
    <a href="{{route('usuario.create')}}"><button type="button" class="btn btn-success btn-lg fleft">Cadastrar novo usuario</button></a>
    <a href="{{route('usuario.index')}}"><button type="button" class="btn btn-secondary btn-lg fleft a">Exibir usuarios</button></a>
</div>

<style>
    .fleft {
        width: 21%;
        margin: 1.5%;
        height: 100%;
    }

    .a {
        background-color: #01885fe6;
    }
</style>
@stop