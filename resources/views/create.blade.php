<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
    <link rel="stylesheet" href="/create.css">
</head>

<body>

    <div class="form-container">
        <h1>Cadastrar Produto</h1>

        <form action="/produtos" method="POST" enctype="multipart/form-data">
            <!-- Token de segurança do Laravel -->
            @csrf
            <div class="input-group">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" autocomplete="off" required>
            </div>

            <div class="input-group">
                <label for="preco">Preço:</label>
                <input type="text" id="preco" name="preco" autocomplete="off" required>
            </div>

            <div class="input-group">
                <label for="imagem">Imagem:</label>
                <input type="file" id="imagem" name="imagem" autocomplete="off" required>
            </div>

            <button type="submit">Cadastrar</button>
        </form>
    </div>

</body>

</html>