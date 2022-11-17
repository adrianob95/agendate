@extends('layouts.template')

@section('title', config('app.name').' - Mostrar lista')
@section('pagina', 'Mostrar lista')
@section('pagina2', 'Mostrar lista')
@section('content')
<script>
    $('.alert').alert();
</script>
<form action="" method="get">
    @csrf


    <div id="corpo">
        <div class="form-row">
            <div class="form-group col-md-3">

                <label readonly for="obs">Mês da lista</label>
                <input name="mes" readonly class="form-control" id="mes" value="{{$lista->mes}}">
            </div>


            <div class="form-group col-md-5">
                <label readonly for="obs">Ano da lista</label>
                <input readonly class="form-control" value="{{$lista->ano}}">
            </div>

        </div>


        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="obs">Descrição</label>
                <textarea rows="5" readonly class="form-control" name="descricao" id="descricao">{{$lista->descricao}}</textarea>
            </div>
        </div>

    </div>
</form>
<h6>lista registrado por: {{$lista->user->name}} em {{ \Carbon\Carbon::parse($lista->created_at)->format('d/m/Y - H:i:s')}}</h6>
@stop