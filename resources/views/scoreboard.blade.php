@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Placar</div>

                <div class="card-body">
                    <table class="table table-striped">
                        <tr>
                          <th>Usuario</th>
                          <th>Pontuacao</th>
                        </tr>

                        @foreach ($usuarios as $usuario)
                          @foreach ($score as $ponto)
                            <tr>
                                <td>{{$usuario}}</td>
                                <td>{{$ponto}}</td>
                            </tr>
                            @endforeach               
                        @endforeach
                    </table> 
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
