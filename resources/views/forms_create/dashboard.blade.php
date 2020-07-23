    @extends('layout.cabecalho')

    @section('titulo_pagina')
        Dashboard
    @endsection

    @section('titulo')
        Dashboard
    @endsection


@section('conteudo')

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Data</th>
                    <th>Emitente</th>
                    <th>Destinatária</th>
                    <th>Tipo Documento Arquivado</th>
                    <th>Tipo de Projeto</th>
                    <th>Número Documento</th>
                    <th>Valor</th>
                    <th>Data Referência</th>
                    <th>Titulo Documento</th>
                    <th>Palavra Chave</th>
                    <th>Departamento</th>
                    <th>Ferramentas</th>
                </tr>
            </thead>


            <tbody>

                @foreach($dash as $dashboard)
                    <tr>
                        <td scope="row">{{$dashboard->id_codigo}}</td>
                        <td> <a href="documentos_edit/{{$dashboard->id_codigo}}" method="GET">{{$dashboard->data}}</a></td>
                        <td> {{$dashboard->Emp_Emit}}</td>
                        <td> {{$dashboard->Emp_Dest}}</td>
                        <td> {{$dashboard->Formato_Doc}}</td>
                        <td> {{$dashboard->Tp_Projeto}}</td>
                        <td> {{$dashboard->Nome_Doc}}</td>
                        <td> R${{$dashboard->Valor_Doc}}</td>
                        <td> {{$dashboard->Dt_Ref}}</td>
                        <td> {{$dashboard->Tit_Doc}} </td>
                        <td> {{$dashboard->Palavra_Chave}} </td>
                        <td> {{$dashboard->Dep}} </td>
            

                    <td><form method="POST" action="{{route('visualizar_anexo')}}" >
                    @csrf
                    <input type="hidden" name="id_codigo" value="{{$dashboard->id_codigo}}">
                    <input type="submit" value="visualizar anexo" class="btn btn-default">
                    </form></td>

                    </tr>
                @endforeach
            </tbody>
        </table>
 
    @endsection