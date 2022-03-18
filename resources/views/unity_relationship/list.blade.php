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
                    <td></td>                             
                </tr>              
            @endforeach
        </tbody>
    </table>
</div>
@endsection