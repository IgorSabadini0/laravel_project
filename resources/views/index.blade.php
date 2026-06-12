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
            min-height: 100vh; /* Mudado de height para min-height para a página crescer se precisar */
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 2rem 0; /* Espaçamento nas bordas em telas menores */
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
            width: 100%;
            max-width: 650px;
            /* Removidos o max-height e o overflow-y para eliminar a barra de scroll interna */
        }

        @media (max-width: 600px) {
            .card {
                padding: 2rem; /* Melhora o visual em celulares */
            }
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

        /* ==========================================================================
           FORMULÁRIO DE BUSCA
           ========================================================================== */
        .search-form {
            display: flex;
            gap: 0.5rem;
            margin: 1.5rem 0;
            width: 100%;
            align-items: center;
        }

        .search-input {
            flex: 1;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            padding: 0.75rem 1rem;
            border-radius: 8px;
            color: #fff;
            font-family: inherit;
            font-size: 0.95rem;
            outline: none;
            transition: all 0.3s ease;
        }

        .search-input:focus {
            border-color: #6366f1;
            background: rgba(255, 255, 255, 0.08);
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.2);
        }

        .search-input::placeholder {
            color: #64748b;
        }

        .search-button {
            background: #6366f1;
            color: #fff;
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            font-weight: 600;
            font-family: inherit;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.1s ease;
        }

        .search-button:hover {
            background: #4f46e5;
        }

        .search-button:active {
            transform: scale(0.98);
        }

        .clear-button {
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

        .clear-button:hover {
            background: #ef4444;
            color: #fff;
            border-color: #ef4444;
        }

        .clear-button:active {
            transform: scale(0.98);
        }

        /* ==========================================================================
           BOTÕES DE AÇÃO DOS PRODUTOS (CORRIGIDOS E UNIFICADOS)
           ========================================================================== */
        .product-actions {
            display: flex;
            gap: 0.5rem;
            margin-top: 1rem;
            width: 100%;
        }

        .product-actions form {
            flex: 1;
            margin: 0;
            padding: 0;
        }

        .btn-action {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            padding: 0.6rem 1rem;
            border-radius: 8px;
            font-size: 0.9rem;
            font-weight: 600;
            font-family: inherit;
            text-decoration: none;
            cursor: pointer;
            transition: all 0.2s ease;
            border: none;
            text-align: center;
        }

        .btn-action:active {
            transform: scale(0.96);
        }

        /* Variação Editar (Azul/Roxo) */
        .btn-edit {
            background-color: #6366f1;
            color: #fff;
        }

        .btn-edit:hover {
            background-color: #4f46e5;
        }

        /* Variação Excluir (Vermelho sutil que ganha destaque no hover) */
        .btn-delete {
            background-color: rgba(239, 68, 68, 0.15);
            color: #ef4444;
            border: 1px solid rgba(239, 68, 68, 0.3);
        }

        .btn-delete:hover {
            background-color: #ef4444;
            color: #fff;
            border-color: #ef4444;
        }
    </style>
</head>
<body>

    <div class="card">
        <h1>Cadastro de Produtos</h1>
        <br>
        <a href="/produtos/create" style="display: inline-block; padding: 0.75rem 1.5rem; background-color: #6366f1; color: #fff; border-radius: 8px; text-decoration: none; font-weight: 600; transition: background-color 0.3s ease;">
            Criar Produto
        </a>
        <br>
        <br>
        @if (session('sucesso'))
            <p id="msg-sucesso" style="color: #4ade80; font-weight: 600; margin-bottom: 1rem; display: block; text-transform: none; letter-spacing: normal;">{{ session('sucesso') }}</p>
        @endif

        <form action="/produtos/buscar" method="get" class="search-form">
            @csrf 
            <input type="text" name="busca" placeholder="Buscar produtos..." class="search-input" value="{{ $busca ?? '' }}">
            <button type="submit" class="search-button">Buscar</button>
            @if(!empty($busca))
                <a href="/produtos" class="clear-button">Limpar</a>
            @endif
        </form>

        @forelse ($produtos as $produto)
            <div style="background: rgba(255, 255, 255, 0.05); padding: 1.25rem; border-radius: 12px; margin-bottom: 0.75rem; text-align: left; border: 1px solid rgba(255, 255, 255, 0.05);">
                <h2 style="font-size: 1.25rem; font-weight: 600; margin-bottom: 0.25rem;">{{ $produto->nome }}</h2>
                <p style="color: #94a3b8; text-transform: none; letter-spacing: normal; font-size: 0.9rem; margin-bottom: 0.15rem;">Preço: R$ {{ number_format($produto->preco, 2, ',', '.') }}</p>
                <p style="color: #64748b; text-transform: none; letter-spacing: normal; font-size: 0.85rem; margin-bottom: 0.15rem;">Criado em: {{ $produto->created_at->format('d/m/Y H:i') }}</p>
                <p style="color: #64748b; text-transform: none; letter-spacing: normal; font-size: 0.85rem; margin-bottom: 0.5rem;">Id: {{ $produto->id }}</p>
                
                <div class="imagem" style="margin: 1rem 0; display: flex; justify-content: center; align-items: center; width: 100%;">
                    @if ($produto->imagem)
                        <img src="{{ asset('/' . $produto->imagem) }}" alt="{{ $produto->nome }}" style="max-width: 130px; border-radius: 6px;">
                    @else
                        <p style="color: #f87171; text-transform: none; letter-spacing: normal; font-size: 0.85rem;">Sem imagem disponível</p>
                    @endif
                </div>

                <div class="product-actions">
                    <a href="/produtos/{{ $produto->id }}/edit" class="btn-action btn-edit">
                        Editar
                    </a>
                    
                    <form action="/produtos/{{ $produto->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-action btn-delete">
                            Excluir
                        </button>
                    </form>
                </div>
            </div>
        @empty
            <div style="background: rgba(255, 255, 255, 0.02); padding: 2rem; border-radius: 8px; border: 1px dashed rgba(255, 255, 255, 0.15); margin-top: 1rem;">
                @if(!empty($busca))
                    <p style="color: #f87171; text-transform: none; letter-spacing: normal; font-size: 1.05rem;">
                        🔍 Nenhum produto encontrado para a busca: <strong>"{{ $busca }}"</strong>
                    </p>
                @else
                    <p style="color: #94a3b8; text-transform: none; letter-spacing: normal; font-size: 1.05rem;">
                        📦 Nenhum produto cadastrado no momento.
                    </p>
                @endif
            </div>
        @endforelse
    </div>

    <script>
        setTimeout(() => {
            const successMessage = document.getElementById('msg-sucesso');
            if (successMessage) {
                successMessage.style.display = 'none';
            }
        }, 3000);
    </script>
</body>
</html>