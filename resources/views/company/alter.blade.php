@extends('layout.app')

@section('content')
 <div class="jumbotron bg-dark text-white">
    <div class="container text-center">
        <h1 class="display-4">Empresa</h1>
        <hr class="my-4">
        <p class="lead">Alterar Empresa</p>
    </div>
</div>

 <div class="container py-5">
    <form action="{{ route('company.update', $Company->id) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
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
                    <input type="text" id="cnpj" name="cnpj" value="{{$Company->cnpj}}"  class="form-control input-sn"/>
                    <label for="razao">Razão:</label>
                    <input type="text" id="razao" name="razao" value="{{$Company->social_reason}}" class="form-control input-sn"/><br>
                    <label for="fantasia">Fantasia:</label>
                    <input type="text" id="fantasia" name="fantasia" value="{{$Company->fantasy_name}}" class="form-control input-sn"/><br>
                    <label for="fone1">Telefone:</label>
                    <input type="text" id="fone1" name="fone1" value="{{$Company->phone}}" class="form-control input-sn"/><br>
                    <label for="email">Email:</label>
                    <input type="text" id="email" name="email" value="{{$Company->email}}" class="form-control input-sn"/><br>
                    <label for="cep">CEP:</label>
                    <input type="text" id="cep" name="cep" value="{{$Company->zip_code}}" class="form-control input-sn"/><br>
                    <label for="logradouro">Logradouro:</label>
                    <input type="text" id="logradouro" name="logradouro" value="{{$Company->public_place}}" class="form-control input-sn"/><br>
                    <label for="numero">Número:</label>
                    <input type="text" id="numero" name="numero" value="{{$Company->number}}" class="form-control input-sn"/><br>
                    <label for="complemento">Complemento:</label>
                    <input type="text" id="complemento" name="complemento" value="{{$Company->complement}}" class="form-control input-sn"/><br>
                    <label for="bairro">Bairro:</label>
                    <input type="text" id="bairro" name="bairro" value="{{$Company->district}}" class="form-control input-sn"/><br>
                    <label for="uf">UF:</label>
                    <input type="text" id="uf" name="uf" value="{{$Company->state}}" class="form-control input-sn"/><br>
                    <label for="municipal_registration">Segmento:</label><br>
                    <select class="form-select form-select-lg mb-3" aria-label="form-select-lg example" name="segment_id" >
                        @foreach ($getSegment as $seg)
                        <option value="{{ $seg->id }}">{{ $seg->description }}</option>
                        @endforeach
                    </select><br>
                    <label for="municipal_registration">Inscrição Municipal:</label>
                    <input type="text" id="municipal_registration" name="municipal_registration" value="{{$Company->municipal_registration}}" class="form-control input-sn"/><br>
                    <label for="state_registration">Inscrição Estadual:</label>
                    <input type="text" id="state_registration" name="state_registration" value="{{$Company->state_registration}}" class="form-control input-sn"/><br>
                    <button type="submit" class="btn btn-success col-sm-12">Alterar</button>
                </div>
            </div>
      </form>
 </div>

@endsection