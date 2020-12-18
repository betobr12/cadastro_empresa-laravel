@extends('layout.app')

@section('content')
<div class="jumbotron bg-dark text-white">
    <div class="container text-center">
        <h1 class="display-4">Empresa</h1>
        <hr class="my-4">
        <p class="lead">Cadastrar Empresa</p>
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
            <div class="container" id="form">
                <div class="panel-body">
                    <div id="status"></div>
                    <label for="cnpj">CNPJ:</label>
                    <input type="text" id="cnpj" name="cnpj"  class="form-control input-sn"/>
                    <label for="razao">Razão:</label>
                    <input type="text" id="razao" name="razao" class="form-control input-sn"/><br>
                    <label for="fantasia">Fantasia:</label>
                    <input type="text" id="fantasia" name="fantasia" class="form-control input-sn" /><br>
                    <label for="fone1">Telefone:</label>
                    <input type="text" id="fone1" name="fone1" class="form-control input-sn" /><br>
                    <label for="email">Email:</label>
                    <input type="text" id="email" name="email" class="form-control input-sn"/><br>
                    <label for="cep">CEP:</label>
                    <input type="text" id="cep" name="cep" class="form-control input-sn" /><br>
                    <label for="logradouro">Logradouro:</label>
                    <input type="text" id="logradouro" name="logradouro" class="form-control input-sn"/><br>
                    <label for="numero">Número:</label>
                    <input type="text" id="numero" name="numero" class="form-control input-sn"/><br>
                    <label for="complemento">Complemento:</label>
                    <input type="text" id="complemento" name="complemento" class="form-control input-sn"/><br>
                    <label for="bairro">Bairro:</label>
                    <input type="text" id="bairro" name="bairro" class="form-control input-sn"/><br>
                    <label for="uf">UF:</label>
                    <input type="text" id="uf" name="uf" class="form-control input-sn"/><br>
                    <label for="municipal_registration" >Segmento:</label><br>
                    <select class="form-select form-select-lg mb-3" aria-label="form-select-lg example" name="segment_id" >
                        @foreach ($getSegment as $seg)
                        <option value="{{ $seg->id }}">{{ $seg->description }}</option>
                        @endforeach
                    </select><br>
                    <label for="municipal_registration">Inscrição Municipal:</label>
                    <input type="text" id="municipal_registration" name="municipal_registration" class="form-control input-sn"/><br>
                    <label for="state_registration">Inscrição Estadual:</label>
                    <input type="text" id="state_registration" name="state_registration" class="form-control input-sn"/><br>
                    <button type="submit" class="btn btn-success col-sm-12">Cadastrar</button>
                </div>
            </div>
      </form>
 </div>
@endsection
