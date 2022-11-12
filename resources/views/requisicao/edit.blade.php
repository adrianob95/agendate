@extends('layouts.template')

@section('title', config('app.name').' - Editar Requisição')
@section('pagina', 'Editar Requisição')
@section('pagina2', 'Editar Requisição')
@section('content')
<script>
    $('.alert').alert();
</script>
<div class="form-row">
    <div class="form-group col-md-12">
        <fieldset>
            <label for="nome" class="required">Nome: </label>
            <input readonly type="nome" value="{{$requisicao->usuario->nome}} - CPF: {{$requisicao->usuario->cpf}} - RG: {{$requisicao->usuario->rg}} - TITULO: {{$requisicao->usuario->titulo}} - COD={{$requisicao->usuario->id}}" onkeyup="up()" class="form-control" required name="nome" id="nome">
        </fieldset>
    </div>
</div>
<form action="{{route('requisicao.update', $requisicao->id)}}" method="post">
    @csrf
    @method('put')

    <div id="corpo">
        <div class="form-row">

            <div class="form-group col-md-2">
                <label for="datarecebido" class="required">Recebemos em</label>
                <input type="date" required name="datarecebido" class="form-control" id="datarecebido" value="{{date('Y-m-d')}}">
            </div>



            <div class="form-group col-md-5">
                <label for="indicacao">Indicação</label>
                <input type="text" value="{{$requisicao->indicacao}}" class="form-control" id="indicacao" name="indicacao" placeholder="Indicação/Motivo">
            </div>
            <div class="form-group col-md-5">
                <label for="procedimento" class="required">Procedimento</label>
                <input type="text" list="procedimentos" value="{{$requisicao->procedimento}}" id="procedimento" name="procedimento" required class="form-control">
                <datalist id="procedimentos">
                    @foreach($procedimentos as $item)

                    <option value="{{$item->procedimento}}">
                        @endforeach


                </datalist>
            </div>
        </div>


        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="obs">Descrição</label>
                <textarea rows="5" class="form-control" name="obs" id="obs">{{$requisicao->obs}}</textarea>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Editar requisicao</button>
        <!-- <a id="btnnovo" class="btn btn-warning" href="{{route('usuario.create')}}?url=requisicao.create">Cadastre novo usuario</a> -->

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