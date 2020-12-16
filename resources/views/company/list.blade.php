@extends('layout.app')

@section('content')
<div class="container container_table">
    <table id="table_company" class="table_company">
        <thead>
            <tr>
                <th>ID</th>
                <th>CNPJ</th>
                <th>Nome</th>
                <th>Nome Fantasia</th>
                <th>Seguimento</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $comp)
                <tr>
                    <td>{{$comp->id}}</td>
                    <td>{{$comp->cnpj}}</td>   
                    <td>{{$comp->social_reason}}</td>
                    <td>{{$comp->fantasy_name}}</td>
                    <td>{{$comp->seg_description}}</td>
                    <td></td>                             
                </tr>              
            @endforeach
        </tbody>
    </table>
</div>
@endsection