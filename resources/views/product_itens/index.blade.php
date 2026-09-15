@extends('layouts.app')

@section('title', 'Itens de composição')

@section('content')
    <div class="card">
        @if ($itens->isEmpty())
            <p class="vazio">Nenhum item de composição cadastrado.</p>
        @else
            <table>
                <thead>
                    <tr>
                        <th>Produto</th>
                        <th>Cor</th>
                        <th class="numero">Quantidade</th>
                        <th class="numero">Valor</th>
                        <th class="numero">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($itens as $item)
                        <tr>
                            <td>{{ $item->product->nome }}</td>
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
@endsection
