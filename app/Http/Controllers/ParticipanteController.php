<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Participante;

class ParticipanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
           
        $participante = new Participante();

        $participantes = $participante::all();

        $texto = "Não Existe Participantes Cadastrados no banco de dados - Cadastre Primeiro Para Visualizar";

        return view('participantes_show', compact('participantes', 'texto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // indica acao dentro do formulario
        $acao = 1;

        $titulo = "Inserir Participantes";

        return view('participantes_form', compact('acao', 'titulo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //indica que o campo d tabla deve ser unico na tabela
        // min e max numero de caracteres
        // numeric que o campo deve ser numerico  

        $validatedData = $request->validate([
            'raca' => 'required|unique:participantes|min:3|max:100',
            'proprietario' => 'required|min:3|max:50',
            'peso' => 'required|numeric',
            'valor' => 'required|numeric'
        ]);



        // obtem todos os campos do formulario
        $dados = $request->all();

        //insere um registro
        $part = Participante::create($dados);

        return redirect()->route('participantes.index')->with('status', $request->proprietario . ' Cadastrado com sucesso '); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $part = new Participante();

        $participantes = $part->find($id);

        $acao = 3;

        $titulo = "Visualizador de Partitipantes";

        return view('participantes_form', compact('participantes', 'acao', 'titulo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $part = new Participante();

        $participantes = $part->find($id);

        $acao = 2;

        $titulo = "Edição de Participantes";

        return view('participantes_form', compact('participantes', 'acao', 'titulo'));
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
        $validatedData = $request->validate([
            'raca' => 'required|unique:participantes,raca,' .$id. '|min:3|max:100',
            'proprietario' => 'required|min:3|max:40',
            'peso' => 'required|numeric',
            'valor' => 'required|numeric'
        ]);


        $part = Participante::find($id);

        $participantes = $request->all();

        $alterado = $part->update($participantes);

        if ($alterado){
            return redirect()->route('participantes.index')->with('status', $request->proprietario . ' Alterado com Sucesso!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $part = Participante::find($id);
        if ($part->delete()) {
           return redirect()->route('participantes.index')->with('status', $part->proprietario . ' Excluido! ');
        }
    }


    public function search(Request $request)
    {

       $dados = $request->all();
       $search = Participante::Where('raca', 'like', '%' . $dados['search']. '%')->orWhere('proprietario','like', '%' .$dados['search']. '%')->get();

        return view('participantes_show', ['participantes' => $search]);

    }


}
