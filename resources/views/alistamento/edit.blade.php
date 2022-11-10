@extends('layouts.template')

@section('title', config('app.name').' - Editar Alistamento')
@section('pagina', 'Editar Alistamento')
@section('pagina2', 'Editar Alistamento')
@section('content')
<script>
    $('.alert').alert();
</script>
<div class="form-row">
    <div class="form-group col-md-12">
        <fieldset>
            <label for="nome" class="required">Nome: </label>
            <input readonly type="nome" value="{{$alistamento->usuario->nome}} - CPF: {{$alistamento->usuario->cpf}} - RG: {{$alistamento->usuario->rg}} - TITULO: {{$alistamento->usuario->titulo}} - COD={{$alistamento->usuario->id}}" onkeyup="up()" class="form-control" required name="nome" id="nome">



        </fieldset>
    </div>
</div>
<form action="{{route('alistamento.update', $alistamento->id)}}" method="post">
    @csrf
    @method('put')

    <div id="corpo">
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="obs">Qual o atendimento? </label>
                <select name="alistamento" class="form-control" id="alistamento">
                    <option @if($alistamento->alistamento == "Alistamento") selected @endif value="Alistamento">Alistamento</option>
                    <option @if($alistamento->alistamento == "Atualização") selected @endif value="Atualização">Atualização</option>
                    <option @if($alistamento->alistamento == "Justificativa") selected @endif value="Justificativa">Justificativa</option>
                    <option @if($alistamento->alistamento == "Pagamento/Boleto") selected @endif value="Pagamento/Boleto">Pagamento/Boleto</option>
                    <option @if($alistamento->alistamento == "Consulta") selected @endif value="Consulta">Consulta</option>
                    <option @if($alistamento->alistamento == "Outros") selected @endif value="Outros">Outros</option>
                </select>

            </div>

            <div class="form-group col-md-4">
                <label for="obs">Qual o situação atual? </label>
                <select name="situacao" class="form-control" id="situacao">
                    <option @if($alistamento->situacao == "Aguardando aprovação") selected @endif value="Aguardando aprovação">Aguardando aprovação</option>
                    <option @if($alistamento->situacao == "Atualização") selected @endif value="Atualização">Concluido</option>
                    <option @if($alistamento->situacao == "Justificativa") selected @endif value="Justificativa">Pendencia</option>
                    <option @if($alistamento->situacao == "Pagamento/Boleto") selected @endif value="Pagamento/Boleto">Enviado documentos</option>
                    <option @if($alistamento->situacao == "Eleitor ciente de pedencia") selected @endif value="Eleitor ciente de pedencia">Eleitor ciente de pedencia</option>
                    <option @if($alistamento->situacao == "Eleitor ciente de conclusão") selected @endif value="Eleitor ciente de conclusão">Eleitor ciente de conclusão</option>
                    <option @if($alistamento->situacao == "Emitido e Entregue") selected @endif value="Emitido e Entregue">Emitido e Entregue</option>
                    <option @if($alistamento->situacao == "Outros") selected @endif value="Outros">Outros</option>
                </select>

            </div>
            <div class="form-group col-md-5">
                <label for="obs">Protocolo</label>
                <input type="text" class="form-control" value="{{$alistamento->protocolo}}" required name="protocolo" id="protocolo">
            </div>
        </div>


        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="obs">Descrição</label>
                <textarea rows="5" class="form-control" name="descricao" id="descricao">{{$alistamento->descricao}}</textarea>
            </div>
        </div>


        <button type="submit" class="btn btn-primary">Editar alistamento</button>
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