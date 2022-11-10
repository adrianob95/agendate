@extends('layouts.template')

@section('title', config('app.name').' - Mostrar alistamento')
@section('pagina', 'Mostrar alistamento')
@section('pagina2', 'Mostrar alistamento')
@section('content')
<script>
    $('.alert').alert();
</script>
<div class="form-row">
    <div class="form-group col-md-12">
        <fieldset>
            <label for="nome" class="required">Nome: </label>
            <input readonly autofocus list="usuarios" type="text" onkeydown="up()" class="form-control" required name="nome" id="nome" value="{{$alistamento->usuario->nome}} - CPF: {{$alistamento->usuario->cpf}} - RG: {{$alistamento->usuario->rg}} - TITULO: {{$alistamento->usuario->titulo}} - COD={{$alistamento->usuario->id}}" placeholder="Clique ou digite o nome do usuario, caso ao clicar e selecionar um usuario os campos abaixo não aparecer atualize a pagina ou clique fora.">
            <a href="{{route('usuario.show', $alistamento->usuario->id)}}">Consultar Usuario</a>
            <datalist id="usuarios">
                @foreach($usuarios as $usuario)

                <option value="{{$usuario->nome}} - CPF: {{$usuario->cpf}} - RG: {{$usuario->rg}} - TITULO: {{$usuario->titulo}} - COD={{$usuario->id}}">

                    @endforeach
            </datalist>
        </fieldset>
    </div>
</div>
<form action="{{route('alistamento.store')}}" method="post">
    @csrf

    <input type="hidden" class="form-control" name="user_id" id="user_id">
    <input type="hidden" class="form-control" name="usuario_id" id="usuario_id">

    <div id="corpo">
        <div class="form-row">
            <div class="form-group col-md-3">
                <label readonly for="obs">Qual o atendimento? </label>
                <input readonly class="form-control" value="{{$alistamento->alistamento}}">
            </div>
            <div class="form-group col-md-4">
                <label readonly for="obs">Qual a situação? </label>
                <input readonly class="form-control" value="{{$alistamento->situacao}}">
            </div>
            <div class="form-group col-md-5">
                <label readonly for="obs">Protocolo</label>
                <input readonly class="form-control" value="{{$alistamento->protocolo}}">
            </div>
        </div>


        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="obs">Descrição</label>
                <textarea rows="5" readonly class="form-control" name="descricao" id="descricao">{{$alistamento->descricao}}</textarea>
            </div>
        </div>

    </div>
</form>
<h6>alistamento registrado por: {{$alistamento->user->name}} em {{ \Carbon\Carbon::parse($alistamento->created_at)->format('d/m/Y - H:i:s')}}</h6>
<script>
    function qs(query, context) {
        return (context || document).querySelector(query);
    }

    function qsa(query, context) {
        return (context || document).querySelectorAll(query);
    }

    qs("#nome").addEventListener('change', function(e) {

        var options = qsa('#' + e.target.getAttribute('list') + ' > option'),
            values = [];

        [].forEach.call(options, function(option) {
            values.push(option.value)
        });

        var currentValue = e.target.value;
        var currentValue2 = e.target.value;

        if (values.indexOf(currentValue) !== -1) {

            // document.getElementById('localdestino').value = e.target.value.slice(e.target.value.indexOf('-') + 2, e.target.value.length);
            // document.getElementById('cargodestino').value = e.target.value.slice(e.target.value.indexOf(',') + 2, e.target.value.indexOf('-') - 1);
            // document.getElementById('destinatario').value = e.target.value.slice(e.target.value.indexOf(':') + 2, e.target.value.indexOf(','));
            // document.getElementById('tratamento').value = currentValue2.slice(0, currentValue2.indexOf(':'));

            // document.getElementById('localdestino').style = "background-color: #ccc";
            // document.getElementById('cargodestino').style = "background-color: #ccc";
            // document.getElementById('destinatario').style = "background-color: #ccc";
            // document.getElementById('tratamento').style = "background-color: #ccc";

            document.getElementById('usuario_id').value = currentValue2.slice(currentValue2.indexOf('=') + 1, e.target.value.length);
            console.log('evento "change" %s', currentValue2.slice(currentValue2.indexOf('=') + 1, e.target.value.length));

        }

    });
</script>

@stop