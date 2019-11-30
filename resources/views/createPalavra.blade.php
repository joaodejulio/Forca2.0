@extends('layouts.app')
@section('content')

<div class="card-deck-wrapper">
        <div class="card-deck">
          <div class="card card-1">
      
            <div class="card-block">
              <h4 class="card-header">Cadastrar Palavra</h4>
              <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{session('status')}}
                        </div>
                    @endif

                    <form method="post" action="{{route('admin.createPalavra')}}">
                        @csrf
                        <div class="form-group">
                            <label for="name">Palavra:</label>
                            <input type="text" class="form-control" name="palavra_name"/>
                        </div>
                      
                        <select class="form-control" id="categoria" name ="categoria">
                                @foreach($categorias as $categoria)
                                @php
                                @endphp
                                <option value="{{$categoria['id']}}" data-nome="{{$categoria['name']}}" data-valor="{{$categoria['id']}}">
                                 <span>{{$categoria['name']}}</span>
                                </option>
                                @endforeach
                        </select>           
                        <button type="submit" class="btn btn-success">Adicionar</button>
                    </form>
                </div>
            </div>
          </div>
          <div class="card card-1">
            <div class="card-block">
              <h4 class="card-header">Palavras Cadastradas</h4>
              <div class="card-body">
                    <table class="table table-striped">
                            <tr>
                              <th>Palavra</th>
                              <th>Categoria</th>
                              <th>Ações</th>
                            </tr>

                            @foreach ($palavras as $palavra)
                                <tr>
                                    <td>{{$palavra->name}}</td>
                                    <td>{{$categoria->name}}</td>
                                    <td><button class="btn btn-primary" onclick="window.location='{{ route('admin.editPalavra', ['id'=>$palavra->id]) }}'">Editar</button>
                                        <button class="btn btn-danger" onclick="window.location='{{ route('admin.destroyPalavra', ['id'=>$palavra->id]) }}'">Excluir</button></td>
                                </tr>               
                            @endforeach
                          </table> 
                
              </div>
            </div>
          </div>
        </div>
      </div>

@endsection

