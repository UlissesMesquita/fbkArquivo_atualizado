@extends('layout.cabecalho')

@section('titulo_pagina')
    Anexos
@endsection

@section('titulo')
    Visualizar Anexos
@endsection


@section('conteudo')

<table>
  <thead>
    <tr> <th> </th> </tr>
  </thead>
    <tbody>
        @foreach($files as $file)
        <tr>
            <a href="{{ asset("storage/anexos/".$file->path)}}" class="btn btn-default">  {{$file->path}} </a>
        </tr>
        @endforeach

    </tbody>
</table>


@endsection