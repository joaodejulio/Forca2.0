@extends('layouts.padrao')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Usuário</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h4>Para iniciar o jogo, clique em Jogar e depois em Novo Jogo!</h4>
                    <h3>Divirta-se</h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
