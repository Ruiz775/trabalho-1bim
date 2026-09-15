<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Produtos')</title>
    <style>
        :root {
            --cor-fundo: #f4f5f7;
            --cor-texto: #1f2933;
            --cor-borda: #d9dee4;
            --cor-destaque: #1d4ed8;
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            padding: 0 16px 48px;
            font-family: "Segoe UI", Arial, sans-serif;
            background: var(--cor-fundo);
            color: var(--cor-texto);
        }

        .container { max-width: 960px; margin: 0 auto; }

        header {
            display: flex;
            flex-wrap: wrap;
            align-items: baseline;
            gap: 16px;
            padding: 24px 0;
            border-bottom: 1px solid var(--cor-borda);
            margin-bottom: 24px;
        }

        header h1 { font-size: 22px; margin: 0; }

        nav a {
            color: var(--cor-destaque);
            text-decoration: none;
            margin-right: 16px;
            font-size: 14px;
        }

        nav a:hover { text-decoration: underline; }

        .card {
            background: #fff;
            border: 1px solid var(--cor-borda);
            border-radius: 8px;
            padding: 16px 20px;
            margin-bottom: 20px;
        }

        .card h2 { font-size: 18px; margin: 0 0 4px; }

        .resumo { font-size: 14px; color: #52606d; margin: 0 0 12px; }

        table { width: 100%; border-collapse: collapse; font-size: 14px; }

        th, td {
            text-align: left;
            padding: 8px 10px;
            border-bottom: 1px solid var(--cor-borda);
        }

        th { background: #eef1f5; font-weight: 600; }

        td.numero, th.numero { text-align: right; }

        .vazio { font-size: 14px; color: #7b8794; font-style: italic; }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>@yield('title', 'Produtos')</h1>
            <nav>
                <a href="{{ route('products.index') }}">Produtos e itens</a>
                <a href="{{ route('product-itens.index') }}">Itens</a>
            </nav>
        </header>

        @yield('content')
    </div>
</body>
</html>
