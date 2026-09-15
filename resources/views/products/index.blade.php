@extends('layouts.app')

@section('title', 'Produtos e itens de composição')

@section('content')
    @forelse ($products as $product)
        <div class="card">
            <h2>
                <a href="{{ route('products.show', $product) }}">{{ $product->nome }}</a>
            </h2>
            <p class="resumo">
                Preço: R$ {{ number_format($product->preco, 2, ',', '.') }}
                &middot; Unidade de medida: {{ $product->unidade_medida }}
                &middot; {{ $product->itens->count() }} {{ $product->itens->count() == 1 ? 'item' : 'itens' }}
            </p>

            @if ($product->itens->isEmpty())
                <p class="vazio">Nenhum item de composição cadastrado.</p>
            @else
                <table>
                    <thead>
                        <tr>
                            <th>Cor</th>
                            <th class="numero">Quantidade</th>
                            <th class="numero">Valor</th>
                            <th class="numero">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($product->itens as $item)
                            <tr>
                                <td>{{ $item->cor }}</td>
                                <td class="numero">{{ $item->quantidade }}</td>
                                <td class="numero">R$ {{ number_format($item->valor, 2, ',', '.') }}</td>
                                <td class="numero">R$ {{ number_format($item->quantidade * $item->valor, 2, ',', '.') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    @empty
        <p class="vazio">Nenhum produto cadastrado.</p>
    @endforelse
@endsection
