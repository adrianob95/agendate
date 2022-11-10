@extends('layouts.template')

@section('title', config('app.name').' - Editar Atendimento')
@section('pagina', 'Editar Atendimento')
@section('pagina2', 'Editar Atendimento')
@section('content')
<script>
    $('.alert').alert();
</script>
<div class="form-row">
    <div class="form-group col-md-12">
        <fieldset>
            <label for="nome" class="required">Nome: </label>
            <input readonly type="nome" value="{{$atendimento->usuario->nome}} - CPF: {{$atendimento->usuario->cpf}} - RG: {{$atendimento->usuario->rg}} - TITULO: {{$atendimento->usuario->titulo}} - COD={{$atendimento->usuario->id}}" onkeyup="up()" class="form-control" required name="nome" id="nome">



        </fieldset>
    </div>
</div>
<form action="{{route('atendimento.update', $atendimento->id)}}" method="post">
    @csrf
@method('put')

    <div id="corpo">
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="obs">Qual o atendimento? </label>
                <select name="atendimento" class="form-control" id="atendimento">
                    <option @if($atendimento->atendimento == "Advogado") selected @endif value="Advogado">Advogado</option>
                    <option @if($atendimento->atendimento == "Documento") selected @endif value="Documento">Documento</option>
                    <option @if($atendimento->atendimento == "Cesta") selected @endif value="Cesta">Cesta</option>
                    <option @if($atendimento->atendimento == "Titulo") selected @endif value="Titulo">Titulo</option>
                    <option @if($atendimento->atendimento == "Gabinete") selected @endif value="Gabinete">Gabinete</option>
                    <option @if($atendimento->atendimento == "Outros") selected @endif value="Outros">Outros</option>
                </select>
            </div>
        </div>


        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="obs">Descrição</label>
                <textarea rows="5" class="form-control" name="descricao" id="descricao">{{$atendimento->descricao}}</textarea>
            </div>
        </div>


        <button type="submit" class="btn btn-primary">Editar atendimento</button>
    </div>
</form>

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