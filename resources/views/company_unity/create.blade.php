@extends('layout.app')

@section('content')
<div class="jumbotron bg-dark text-white">
    <div class="container text-center">
        <h1 class="display-4">Unidades</h1>
        <hr class="my-4">
        <p class="lead">Cadastro de Unidades</p>
    </div>
</div>

 <div class="container py-5">
    <form action="{{ route('company_unity.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if (isset($errors) && count($errors) > 0)
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
        @endif
        <div class="form-group">
          <label for="description">Nome da Unidade</label>
          <input type="text" class="form-control" name="description" id="description" aria-describedby="description">
          <small id="description" class="form-text text-muted">Digite o nome da Unidade.</small>
        </div>
        <button type="submit" class="btn btn-primary">Criar</button>
      </form>
 </div>

@endsection
