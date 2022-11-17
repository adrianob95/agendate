@extends('layouts.template')

@section('title', config('app.name').' - Editar Alistamento')
@section('pagina', 'Editar Alistamento')
@section('pagina2', 'Editar Alistamento')
@section('content')
<script>
    $('.alert').alert();
</script>

<form action="{{route('listas.update', $lista->id)}}" method="post">
    @csrf
    @method('PUT')
    <div id="corpo">
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="obs">Mês da lista</label>
                <select name="mes" class="form-control" id="atendimento">
                    <option @if($lista->mes == "01") selected @endif value="01">Janeiro</option>
                    <option @if($lista->mes == "02") selected @endif value="02">Fevereiro</option>
                    <option @if($lista->mes == "03") selected @endif value="03">Março</option>
                    <option @if($lista->mes == "04") selected @endif value="04">Abril</option>
                    <option @if($lista->mes == "05") selected @endif value="05">Maio</option>
                    <option @if($lista->mes == "06") selected @endif value="06">Junho</option>
                    <option @if($lista->mes == "07") selected @endif value="07">Julho</option>
                    <option @if($lista->mes == "08") selected @endif value="08">Agosto</option>
                    <option @if($lista->mes == "09") selected @endif value="09">Setembro</option>
                    <option @if($lista->mes == "10") selected @endif value="10">Outubro</option>
                    <option @if($lista->mes == "11") selected @endif value="11">Novembro</option>
                    <option @if($lista->mes == "12") selected @endif value="12">Dezembro</option>
                </select>

            </div>
            <div class="form-group col-md-5">
                <label for="obs">Ano da lista</label>
                <input type="text" class="form-control" required name="ano" id="ano" value="{{$lista->ano}}">
            </div>
        </div>


        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="obs">Descrição</label>
                <textarea rows="5" class="form-control" name="descricao" id="descricao">{{$lista->descricao}}</textarea>
            </div>
        </div>


        <button type="submit" class="btn btn-primary">Editar Lista</button>
    </div>
</form>

@stop