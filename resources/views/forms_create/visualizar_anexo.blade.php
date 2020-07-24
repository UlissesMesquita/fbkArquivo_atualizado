@extends('layout.cabecalho')

@section('titulo_pagina')
    Anexos
@endsection

@section('titulo')
    Visualizar Anexos
@endsection


@section('conteudo')

<table>
  
    @foreach($files as $file)
        <ul>
            <a href="{{ asset("storage/anexos/".$file->id_upload_codigo.'/'.$file->path)}}" class="btn btn-default">  {{$file->path}} </a>
        </ul>
    @endforeach

</table>


@endsection