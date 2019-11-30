<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use App\Palavra;
use Symfony\Component\HttpKernel\Event\RequestEvent;

class PalavraController extends Controller
{
    protected $categoria= null;
    protected $palavra= null;

    public function __construct(Categoria $categoria, Palavra $palavra)
    {
        $this->middleware('auth');
        $this->categoria=$categoria;
        $this->palavra=$palavra;
        
    }
   
    public function index()
    {
        $categorias = $this->categoria->getAll();
        $palavras = $this->palavra->getAll();
        return view('createPalavra')->with('categorias', $categorias)->with('palavras', $palavras);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $palavra = new Palavra();
        $palavra->name = $request->palavra_name;
        $palavra->categoria_id = $request->categoria;
        $palavra->save();
        
        return redirect('/admin/palavras');
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
    public function edit(Request $request)
    {
        $palavra =  Palavra::findOrFail($request->id);
        $categoria = Categoria::findOrFail($palavra->categoria_id);
                
        return view('editPalavra')->with('palavras', $palavra)->with('categorias', $categoria);
    }

   
    public function update(Request $request)
    {
        
        $update = ['id'=>$request->palavra_id, 'name'=>$request->palavra_name, 'categoria_id'=>$request->categoria];
        
        Palavra::whereId($request->palavra_id)->update($update);

        return redirect('/admin/palavras');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $palavra =  Palavra::findOrFail($request->id);
        $palavra->delete();

        return redirect('/admin/palavras')->with('success', 'Show is successfully deleted');
    }
}
