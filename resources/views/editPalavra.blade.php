@extends('layouts.app')
@section('content')

<div class="card-deck-wrapper">
        <div class="card-deck">
          <div class="card card-1">
      
            <div class="card-block">
              <h4 class="card-header">Editar Palavra</h4>
              <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{session('status')}}
                        </div>
                    @endif

                    <form method="get" action="{{route('admin.updatePalavra')}}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            @csrf
                            <input type="hidden" class="form-control" name="palavra_id" value="{{$palavras->id}}"/>
                            <label for="name">Palavra:</label>
                        <input type="text" class="form-control" name="palavra_name" value="{{$palavras->name}}"/>
                        </div>
                      
                        <select class="form-control" id="categoria" name ="categoria">
                                <option value="{{$categorias['id']}}" data-nome="{{$categorias['name']}}" data-valor="{{$categorias['id']}}">
                                 <span>{{$categorias['name']}}</span>
                                </option>
                        </select>           
                        <button type="submit" class="btn btn-success">Salvar Alterações</button>
                    </form>
                </div>
            </div>
          </div>
          
        </div>
      </div>

@endsection