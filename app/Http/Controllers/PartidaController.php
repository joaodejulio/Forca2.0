<?php

namespace App\Http\Controllers;
use App\User;
use App\Palavra;
use App\Partida;
use Illuminate\Http\Request;

class PartidaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view("game")->with(['img' => 0]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($idUser,$pontuacao, $idPalavra)
    {
        // 
        $partida = new Partida();
        $partida->pontuacao = $pontuacao;
        $partida->id_palavra = $idPalavra;
        $partida->id_usuario = $idUser;
        
        if($partida->save()) return true;
        else return false;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    

    public function sorteiaPalavra(){
        $qnt_palavras = Palavra::count();
        $sorteada = rand(1,$qnt_palavras);
        
        $palavra =  Palavra::findOrFail($sorteada);
        
        $tam = strlen($palavra->name);
        
        for($i=0; $i<$tam; $i++){
            $word[$i] = '.-';
        }
        $strWord = implode($word); 

        

        return view('game')->with('palavra', $palavra->name)
                           ->with('strWord', $strWord)
                           ->with(['img' => 0])
                           ->with(['hp' => 6]);
        
    }

    public function verificaLetra(Request $request){
        
        $letra = $request->input_letra;
        $palavra = $request->palavra;
        $hp = $request->hp;
        $strWord = $request->word;
        $acerto = false;
        $ptAcerto = 0;

        $letra = strtolower ($letra);
        $palavra = strtolower ($palavra);

        $strWord = explode(" ",$strWord);
        $strWord = implode("", $strWord);

        for ($i=0; $i<strlen($palavra); $i++){
            if($letra == $palavra[$i]){ 
                $strWord[$i] = $letra;
                $acerto = true;
                $ptAcerto++;
            }

        }  

        if (!$acerto){
            $hp--;
        }
        
        $img = 6 - $hp;

        if($img>6) $img=0;

        if($hp >= 0 && $strWord != $palavra){
            return view('game')->with('palavra', $palavra)
                                ->with('strWord', $strWord)
                                ->with(['img' => $img])
                                ->with(['hp' => $hp]);
        }else{
            $pontuacao = 1 + ($ptAcerto * $hp);

            $user  = auth()->user()->name;
            $idUser = User::where('name', $user)->first(); //->id
            $palavra = Palavra::where('name', $palavra)->first();//->id
            
            if(PartidaController::create($idUser->id,$pontuacao, $palavra->id))
                return redirect()->route('scoreboard');
        }

    }

 
    public function scoreboard(){
        $score = Partida::orderBy('pontuacao', 'desc')
                             ->limit(10)
                             ->pluck('pontuacao');
        $user = Partida::rightjoin('users', 'users.id', '=', 'partidas.id_usuario')
                             ->orderBy('partidas.pontuacao', 'desc')
                             ->limit(10)
                             ->pluck('users.name');
          
    
       
        return view('scoreboard')->with('usuarios', $user)->with('score', $score);
    }
}
