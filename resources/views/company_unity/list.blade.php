@extends('layout.app')

@section('content')
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
            @foreach ($items as $comp_uny)
                <tr>
                    <td>{{$comp_uny->id}}</td>
                    <td>{{$comp_uny->description}}</td>
                    <td>
                        <a href="{{route('company_unity.edit', $comp_uny->id)}}" class="btn btn-primary">Alterar</a>
                        <button class="btn btn-danger" type="button" onclick="deleteAll({{ $comp_uny->id }})">
                            Excluir
                        </button>
                        <form id="delete-form-{{ $comp_uny->id }}" action="{{ route('company_unity.destroy',$comp_uny->id) }}" method="POST" style="display: none;">
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
