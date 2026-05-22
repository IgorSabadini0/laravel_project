<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class ProdutoController extends Controller
{
    public function index()
    {
        $produtos = Produto::all();
        return view("index");
    }

    public function create()
    {
        return view("create");
    }

    public function store(Request $request) {
        // Pegando os dados do formulário;
        $dados = $request->only(['nome', 'preco']);
        // INSERT INTO produtos (nome, preco) VALUES ($dados['nome'], $dados['preco']);
        Produto::create($dados);
        // Redirecionando para a página de listagem de produtos e exibindo uma mensagem de sucesso;
        return redirect()->to("/produtos")->with("sucesso", "Produto criado com sucesso!");
    }
}
