<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teste Laravel</title>
    <style>
        /* Importando uma fonte moderna do Google Fonts */
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #0f0c1b;
            background-image: 
                radial-gradient(at 0% 0%, hsla(253,16%,7%,1) 0, transparent 50%), 
                radial-gradient(at 50% 0%, hsla(225,39%,30%,0.3) 0, transparent 50%), 
                radial-gradient(at 100% 0%, hsla(339,49%,30%,0.2) 0, transparent 50%);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            color: #fff;
        }

        /* Container do Cartão */
        .card {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            padding: 3rem 5rem;
            border-radius: 24px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
            text-align: center;
            position: relative;
            transition: transform 0.3s ease, border-color 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            border-color: rgba(99, 102, 241, 0.4);
        }

        /* Efeito de brilho de fundo no Hover */
        .card::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            border-radius: 24px;
            background: linear-gradient(135px, #6366f1, #a855f7);
            z-index: -1;
            filter: blur(30px);
            opacity: 0;
            transition: opacity 0.5s ease;
        }

        .card:hover::before {
            opacity: 0.3;
        }

        /* Título Principal com Gradiente Animado */
        h1 {
            font-size: 4rem;
            font-weight: 800;
            letter-spacing: -2px;
            background: linear-gradient(270deg, #ff007f, #7928ca, #4200ff, #ff007f);
            background-size: 600% 600%;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: gradientAnimation 8s ease infinite;
            margin-bottom: 0.5rem;
        }

        /* Subtítulo */
        p {
            color: #94a3b8;
            font-size: 1rem;
            font-weight: 500;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        /* Animação do Gradiente do Texto */
        @keyframes gradientAnimation {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
    </style>
</head>
<body>

    <div class="card">
        <h1>Laravel</h1>
        <p>Ambiente de Teste Ativo</p>
        <!-- Vai pegar a rota do ProdutoController -->
        <p>Route: <strong>/produtos</strong></p>
        <br>
        <a href="/produtos/create" style="display: inline-block; padding: 0.75rem 1.5rem; background-color: #6366f1; color: #fff; border-radius: 8px; text-decoration: none; font-weight: 600; transition: background-color 0.3s ease;">
            Criar Produto
        </a>
        <br>
        <br>
        @if (session('sucesso'))
            <p style="color: #4ade80; font-weight: 600; margin-bottom: 1rem;">{{ session('sucesso') }}</p>
        @endif
    </div>

</body>
</html>