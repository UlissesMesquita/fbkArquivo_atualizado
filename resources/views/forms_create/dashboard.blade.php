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
                    <th>Tipo Documento</th>
                    <th>Nome Documento</th>
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
                        <td> <a href="documentos_edit/{{$dashboard->id_codigo}}" method="GET">{{date('d/m/Y', strtotime($dashboard->data))}}</a></td>
                        <td> {{$dashboard->Emp_Emit}}</td>
                        <td> {{$dashboard->Emp_Dest}}</td>
                        <td> {{$dashboard->Tp_Doc}}</td>
                        <td> {{$dashboard->Nome_Doc}}</td>
                        <td> R${{$dashboard->Valor_Doc}}</td>
                        <td> {{date('d/m/Y', strtotime($dashboard->Dt_Ref))}}</td>
                        <td> {{$dashboard->Tit_Doc}} </td>
                        <td> {{$dashboard->Palavra_Chave}} </td>
                        <td> {{$dashboard->Dep}} </td>
            
                            <!-- Botões de Ação-->
                            <td>

                            

                                <!-- Botão de Exibir PDF -->

                                    <a class="fas fa-file-pdf" href="{{ asset('storage/pdfs/'.$dashboard->id_codigo.'_'. $dashboard->Tit_Doc .'.pdf')}}" target="_blank" method="POST"></a>

                                <!-- Botão de Editar -->
                                
                                    <a class="far fa-edit" href="documentos_edit/{{$dashboard->id_codigo}}" method="GET"></a>
                                
                                <!-- Botão de Apagar -->

                                    <a class="fas fa-trash" href="delete/{{$dashboard->id_codigo}}" method="GET"></a>

                               
                            </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
 
    @endsection