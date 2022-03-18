@extends('layout.app')

@section('content')
<div class="jumbotron bg-dark text-white" >
  <h1 class="display-4">
    @if(date('H')>= 0 && date('H')<=12)
    <p>Bom dia!</p>
    @elseif(date('H')>=13 && date('H')<=18)
    <p>Boa tarde!</p>
    @else
    <p>Boa Noite!</p>
    @endif
  </h1>
  <p class="lead">Sistema de Cadastro de Empresas</p>
  <hr class="my-4">
</div>
<div class="container marketing">
  <div class="row">
  @foreach ($CompanyUnity as $CompanyUni)
  <div class="col-lg-4">
    <svg class="bd-placeholder-img rounded-circle" width="140" height="140">
      <title>Empresa</title>
      <rect width="100%" height="100%" fill="#777"/>
      <text x="50%" y="50%" fill="#777" dy=".3em">140x140</text>
    </svg>
    <h2>{{$CompanyUni->description}}</h2>
    <p>{{$CompanyUni->description}}</p>
    <p><a class="btn btn-secondary" href="{{route('unity_relationship.show', $CompanyUni->id)}}" role="button">Cadastrar empresas para Unidade&raquo;</a></p>
  </div><!-- /.col-lg-4 -->
  @endforeach
  </div><!-- /.row -->
  <!-- START THE FEATURETTES -->
  <hr class="featurette-divider">
  @foreach ($Company as $Comp)
  <div class="row featurette">
    <div class="col-md-7">
        <a class="btn btn-secondary" href="{{route('company.show', $Comp->id)}}" >
      <h2 class="featurette-heading">{{$Comp->social_reason}} <span class="text-muted">-CNPJ {{$Comp->cnpj}}</span></h2>
        <p class="lead">{{$Comp->public_place}}, {{$Comp->number}}, {{$Comp->city}} {{$Comp->zip_code}}</p>
    </a>
    </div>
    <div class="col-md-5">
      <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 500x500"><title>Placeholder</title><rect width="100%" height="100%" fill="#eee"/><text x="50%" y="50%" fill="#aaa" dy=".3em">500x500</text></svg>
    </div>
  </div>
  <hr class="featurette-divider">
  @endforeach
</div>

@endsection
