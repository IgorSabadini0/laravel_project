<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link rel="stylesheet" href="/create.css">
    
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap');
        

        .input-group {
            display: flex;
            gap: 10px; /* Cria um espaçamento maneiro entre os botões */
            align-items: center;
        }
        .cancel-button {
            background: rgba(239, 68, 68, 0.2);
            color: #f87171;
            border: 1px solid rgba(239, 68, 68, 0.4);
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            font-weight: 600;
            font-family: inherit;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s ease;
        }

        .cancel-button:hover {
            background: #ef4444;
            color: #fff;
            border-color: #ef4444;
        }

        .cancel-button:active {
            transform: scale(0.98);
        }
    </style>
</head>

<body>

    <div class="form-container">
        <h1>Editar Produto</h1>

        <form action="/produtos/{{ $produto->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="input-group">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" autocomplete="off" required value="{{ $produto->nome }}">
            </div>

            <div class="input-group">
                <label for="preco">Preço:</label>
                <input type="text" id="preco" name="preco" autocomplete="off" required value="{{ $produto->preco }}">
            </div>

            <div class="input-group">
                <label for="imagem">Imagem:</label>
                <input type="file" id="imagem" name="imagem" accept="image/*">
            </div>

            <div class="input-group">
                <button type="submit">Salvar Alterações</button>
                <a href="/produtos" class="cancel-button">Cancelar</a>
            </div>
        </form>
    </div>

</body>

</html>