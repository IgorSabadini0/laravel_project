<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class ProdutoController extends Controller
{
    public function index()
    {
        $produtos = Produto::all();
        return view("index", ["produtos" => $produtos, "busca" => null]);
    }

    public function create()
    {
        return view("create");
    }

    public function store(Request $request) {
        // Pegando os dados do formulário;
        $dados = $request->only(['nome', 'preco']);
        // INSERT INTO produtos (nome, preco) VALUES ($dados['nome'], $dados['preco']);
        if ($request->hasFile("imagem")) {
            $pasta = public_path("images/produtos");
            if (!is_dir($pasta)) {
                mkdir($pasta, 0755, true);
            }

            $imagem = $request->file("imagem");
            $nomeImagem = time() . "_" . $imagem->getClientOriginalName();
            $imagem->move($pasta, $nomeImagem);
            $dados['imagem'] = "images/produtos/" . $nomeImagem;    
        }
        Produto::create($dados);
        // Redirecionando para a página de listagem de produtos e exibindo uma mensagem de sucesso;
        return redirect()->to("/produtos")->with("sucesso", "Produto criado com sucesso!");
    }

    public function buscar(Request $request) {
        $busca = $request->input("busca", "");

        if (empty($busca)) {
            return redirect()->to("/produtos");
        }

        $produtos = Produto::where("nome", "like", "%$busca%")->get();

        return view("index", ["produtos" => $produtos, "busca" => $busca]);
    }

    public function deletar($id) {
        $produto = Produto::findOrFail($id);
        $produto->delete();
        return redirect()->to("/produtos")->with("sucesso", "Produto deletado com sucesso!");
    }

    public function edit($id) {
        $produto = Produto::findOrFail($id);
        return view("edit", ["produto" => $produto]);
    }

    public function update(Request $request, $id) {
        $produto = Produto::findOrFail($id);

        $dados = $request->only(['nome', 'preco']);

        if ($request->hasFile("imagem")) {
            $pasta = public_path("images/produtos");
            $extensaoImagem = $request->file("imagem")->getClientOriginalExtension();
            $nomeImagem = uniqid() . "." . $extensaoImagem;

            $dados['imagem'] = "images/produtos/" . $nomeImagem;

            $request->file("imagem")->move(public_path("images/produtos"), $nomeImagem);
        }

        $produto->update($dados);
        
        return redirect()->to("/produtos")->with("sucesso", "Produto atualizado com sucesso!");

    }

}
