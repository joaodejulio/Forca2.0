@extends('layouts.padrao')

@section('content')
<div class="container">
        
  <div class="row justify-content-center">
        <div>

                <p> <img class="img-fluid img-responsive" src="{{url('/img/' .$img . '.jpeg')}}" alt="Forca" id="forca" height="220" width="200"></p>
            </div>
        <div class="col-md-8">
          <form method='post' action="{{route('game.letra')}}">
            {{ csrf_field() }}
            <main>
    
            <input type="hidden" id="plv" name="palavra" value="{{$palavra ?? 'nao definida'}}" >
            <input type="hidden" id="vida" name="hp" value="{{$hp ?? 'nao definida'}}" >
            
            {{-- <h4>{{$palavra ?? 'nao definida'}}</h4> --}}
            {{-- <h4>{{$strWord ?? 'nao definida'}}</h4> --}}
            
            
            <div >
                <p>Palavra: </p>
                <div id = "div_Word">
                    @php
                            $word = explode("." , $strWord  ?? 'Pressione.Novo.Jogo');
                            $word = implode(" ", $word);
                            @endphp
                        <label> {{$word ?? 'Pressione Novo Jogo'}}</label>
                    </div>
                    
                    <br><div id="cat"><small><strong>Categoria</strong></small></div>      
                </div>
                
                <input type="hidden" id="w" name="word" value="{{$word ?? 'nao definida'}}" >
                <div>
    
                    <label id="label_letra">Letra:</label>
                    <input type="text" class="form-control mx-sm-4" id="id" name="input_letra">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                    <br>
    
                </div>
                               
                <div class="btn-group" role="group">
                   
                    <button type="button" class="btn btn-outline-primary" onclick="window.location='{{ route('game.sorteio') }}'" id="novo_jogo">Novo jogo</button>
                    <button type="button" class="btn btn-danger"    href="{{ route('logout') }}"
                                                                    onclick="event.preventDefault();
                                                                    document.getElementById('logout-form').submit();" id="sair" >Sair</button>
                </div>
    
            </main>  
    
        </form>
    
        </div>
    </div>
</div>
@endsection

