@extends('layout.app')

@section('content')
<div class="jumbotron bg-dark text-white">
    <h1 class="display-4">{{$company_data->social_reason}}</h1>
    <p class="lead">CNPJ. {{$company_data->cnpj}}</p>
    <hr class="my-4">
    <p>Nome Fantasia. "{{$company_data->fantasy_name}}"</p>
    <p>Endereço: "{{$company_data->public_place}}"</p>
    <p>Numero: "{{$company_data->number}}"</p>
    <p>CEP: "{{$company_data->zip_code}}"</p>    
    <p>Bairro: "{{$company_data->district}}"</p>
    <p>Cidade: "{{$company_data->city}}"</p>
    <p>Complemento: "{{$company_data->complement}}"</p>
    <p>Telefone: "{{$company_data->phone}}"</p>
    <p>Seguimento: "{{$company_data->seg_description}}"</p>
    <p>Inscrição Municipal: "{{$company_data->municipal_registration}}"</p>
    <p>Inscrição Estadual:"{{$company_data->state_registration}}"</p>
    <p>Data da Criação: "{{$company_data->created_at}}"</p>
    <a href="{{route('company.edit', $company_data->id)}}" class="btn btn-primary">Alterar Empresa </a>
  </div>
@endsection
