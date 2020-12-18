@extends('layout.app')

@section('content')

<div class="jumbotron bg-dark text-white">
    <div class="container text-center">
        <h1 class="display-4">{{ $company_unity->description}}</h1>
        <hr class="my-4">
        <p class="lead">Vincular empresa para unidade {{ $company_unity->description}} - COD. {{ $company_unity->id}}</p>
    </div>
</div>
<div class="container py-5">
    <form action="{{ route('unity_relationship.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if (isset($errors) && count($errors) > 0)
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
        @endif
        <div class="form-group">
          <input type="hidden" class="form-control" value="{{ $company_unity->id}}" name="company_unity_id" id="id" aria-describedby="id">
          <input type="hidden" class="form-control" value="{{ $company_unity->id}}" name="id_comp" id="id" aria-describedby="id">
        </div>
        <div class="form-group">
            <div class="form-group">
                <label for="vincular">Vincular com:</label>
                <select name="company_id" class="form-control" id="exampleFormControlSelect1">
                    @foreach ($company_select as $comp)
                    <option value="{{ $comp->id }}">{{ $comp->social_reason }}</option>
                    @endforeach
                </select>
              </div>
            <small id="description" class="form-text text-muted">Selecione a empresa a ser vinculada.</small>
          </div>
        <button type="submit" class="btn btn-primary">Vincular</button>
      </form>
 </div>
 <div class="container container_table ">
    <table id="table_company" class="table_company">
        <thead class="bg-dark text-white">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($companies as $comps)
                <tr>
                    <td>{{$comps->id}}</td>
                    <td>{{$comps->comp_social_reason}}</td>
                    <td>
                        <button class="btn btn-danger" type="button" onclick="deleteAll({{ $comps->id }})">
                            Excluir
                        </button>
                        <form id="delete-form-{{ $comps->id }}" action="{{ route('unity_relationship.destroy',$comps->id) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

