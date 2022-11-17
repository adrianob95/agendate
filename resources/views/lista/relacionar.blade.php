@extends('layouts.template')

@section('title', config('app.name')." - Exibir Lista")
@section('pagina', 'Exibir Lista')
@section('pagina2', 'Exibir Lista')

@section('content')
<div class="container mt-3">
    <div class="d-print-none">
        <h2>Tabela de beneficiados</h2>
        <p>
            Digite algo no campo de entrada abaixo para pesquisar na tabela:
        </p>
    </div>
    <form action="{{route('listas.adicionar')}}" class="d-print-none" id="formrelacionar" method="post">
        @csrf
        <input autofocus list="usuarios" onkeypress="up(event)" class="form-control d-print-none" id="myInput" type="text" placeholder="Procurar.." @if(isset($usuario))value="{{$usuario->nome}} - CPF: {{$usuario->cpf}} - RG: {{$usuario->rg}} - TITULO: {{$usuario->titulo}} - COD={{$usuario->id}}" @endif>
        <input type="hidden" name="usuario_id" id="usuario_id" @if(isset($usuario))value="{{$usuario->id}}" @endif>
        <input type="hidden" name="lista_id" id="lista_id" value="{{$lista->id}}">
        <datalist id="usuarios">
            @foreach($usuarios as $usuario)

            <option value="{{$usuario->nome}} - CPF: {{$usuario->cpf}} - RG: {{$usuario->rg}} - TITULO: {{$usuario->titulo}} - COD={{$usuario->id}}">

                @endforeach
        </datalist>

        <br>
        <div class="form-group col-md-12 " style="text-align: center;">
            <a id="btnnovo" style="margin: 10px;" class="btn btn-primary" href="{{route('usuario.create')}}?url=listas.relacionar&lista={{$lista->id}}">Cadastre novo usuario</a>


            <button class="btn btn-success" id="btnadd" style="align-items: center;">Adicionar na Lista</button>
        </div>
    </form>
</div>
<div class="form-group col-md-12" style="text-align: center;">
    <h1>Lista de {{\Carbon\Carbon::parse('01-'.$lista->mes.'-'.$lista->ano)->translatedFormat('F/Y')}}
    </h1>
    <h7 class="d-print-none">{{$lista->descricao}}<br></h7>

        <h7 class="d-print-none"> Elaborada em {{ \Carbon\Carbon::parse($lista->created_at)->format('d/m/Y - H:i:s')}} por {{$lista->user->name}}</h7>
</div>
<div class="form-group col-md-12" style="text-align: right;">
    <a class="d-print-none" onClick="window.print()"><i class="bi bi-printer-fill" style=" font-size: 2rem; color: red;"></i></a>
</div>
<table class=" table table-bordered table-hover" style="text-align: center;">
    <thead>
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>CPF/NIS</th>
            <th>Endereço</th>
            <th>Contato</th>
            <th class="d-print-none">Ação</th>
        </tr>
    </thead>
    <tbody id="myTable">
        @foreach($lista->usuario as $usuarios)
        <tr>


            <th>{{$loop->index+1 }}</th>
            <th> {{$usuarios->nome}}</th>
            <th> {{$usuarios->cpf}} @if($usuarios->cpf && $usuarios->nis) / @endif{{$usuarios->nis}}</th>
            <th> {{$usuarios->endereco}}</th>
            <th> {{$usuarios->contato}}</th>
            <th class="d-print-none"> <a title="Detalhes do lista" style="display: inline-block;" href="{{route('listas.remover', ['lista' => $lista->id, 'usuario' => $usuarios->id])}}"><i class="bi-trash" style="font-size: 1.4rem; color: red;"></i></a>
            </th>



        </tr> @endforeach
    </tbody>
</table>

</div>
<style>
    table button {
        background-color: Transparent;
        background-repeat: no-repeat;
        border: none;
        cursor: pointer;
        overflow: hidden;
    }
</style>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Atenção</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">


                <label for="recipient-name" class="col-form-label"><b>Tem certeza que deseja deletar este lista? </b><br>Esta ação não poderá ser desfeita!</label>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <form name="formdel" action="" id="formmodal" method="post" style="display: inline-block;">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-primary" type="button" onclick="enviar();" id="deletarbtn">Excluir lista</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function qs(query, context) {
        return (context || document).querySelector(query);
    }

    function qsa(query, context) {
        return (context || document).querySelectorAll(query);
    }

    qs("#myInput").addEventListener('change', function(e) {

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
            document.getElementById('btnadd').style = "display: block";
            document.getElementById('btnnovo').style = "display: none";

            document.getElementById('usuario_id').value = currentValue2.slice(currentValue2.indexOf('=') + 1, e.target.value.length);
            console.log('evento "change" %s', currentValue2.slice(currentValue2.indexOf('=') + 1, e.target.value.length));

        }

    });

    function up(event) {
        document.getElementById('btnadd').style.display = 'none';
        var btn = document.getElementById('btnnovo');
        btn.style = "display: block";
        btn.href = "{{route('usuario.create')}}?url=listas.relacionar&lista={{$lista->id}}&usuarioid=" + document.getElementById('myInput').value + String.fromCharCode(event.keyCode);

    }


    // const urlParams = new URLSearchParams(window.location.search);
    // const products = urlParams.get("usuario");
    // if (!products.length == 0) {
    //     document.getElementById('btnadd').style = 'display: block';
    //     document.getElementById('btnnovo').style = "display: none";
    // }
</script>
@stop