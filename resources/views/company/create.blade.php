@extends('layout.app')

@section('content')
    <div class="jumbotron bg-dark text-white">
        <div class="container text-center">
            <h1 class="display-4">Empresa</h1>
            <hr class="my-4">
            <p class="lead">Cadastro de Empresas</p>
        </div>
    </div>

     <div class="container py-5">
        <form action="{{ route('company.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if (isset($errors) && count($errors) > 0)
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
            @endif
                <div class="panel panel-default" id="form">
                    <div class="panel-body">
                        <div id="status"></div>
                        <label for="cnpj">CNPJ:</label>
                        <input type="text" id="cnpj" name="cnpj"  class="form-control input-sn"/>
                        <label for="razao">Razão:</label>
                        <input type="text" id="razao" name="razao" class="form-control input-sn"/><br>
                       <!-- <label for="responsavel">Responsável:</label>
                        <input type="text" id="responsavel" name="responsavel" class="form-control input-sn"/><br>-->
                        <label for="fone1">Telefone 1:</label>
                        <input type="text" id="fone1" name="fone1" class="form-control input-sn"/><br>
                        <label for="logradouro">Logradouro:</label>
                        <input type="text" id="logradouro" name="logradouro" class="form-control input-sn"/><br>
                        <label for="numero">Número:</label>
                        <input type="text" id="numero" name="numero" class="form-control input-sn"/><br>
                        <label for="bairro">Bairro:</label>
                        <input type="text" id="bairro" name="bairro" class="form-control input-sn"/><br>
                         <!--<label for="municipio">Município:</label>
                        <input type="text" id="municipio" name="municipio" class="form-control input-sn"/><br>
                        <label for="uf">UF:</label>
                        <input type="text" id="uf" name="uf" class="form-control input-sn"/><br>-->
                        <button type="submit" class="btn btn-success col-sm-12">Cadastrar</button>
                    </div>
                </div>
          </form>
     </div>
@endsection
