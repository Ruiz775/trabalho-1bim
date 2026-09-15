<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Popula produtos e seus itens de composicao.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                'nome' => 'Cadeira de Escritório',
                'preco' => 899.90,
                'unidade_medida' => 'UN',
                'itens' => [
                    ['quantidade' => 1, 'cor' => 'Preto', 'valor' => 320.00],
                    ['quantidade' => 5, 'cor' => 'Cinza', 'valor' => 45.50],
                    ['quantidade' => 2, 'cor' => 'Prata', 'valor' => 89.90],
                ],
            ],
            [
                'nome' => 'Mesa de Reunião',
                'preco' => 2450.00,
                'unidade_medida' => 'UN',
                'itens' => [
                    ['quantidade' => 1, 'cor' => 'Carvalho', 'valor' => 1200.00],
                    ['quantidade' => 4, 'cor' => 'Preto', 'valor' => 150.00],
                ],
            ],
            [
                'nome' => 'Tinta Acrílica Premium',
                'preco' => 189.90,
                'unidade_medida' => 'L',
                'itens' => [
                    ['quantidade' => 18, 'cor' => 'Branco Neve', 'valor' => 9.90],
                    ['quantidade' => 18, 'cor' => 'Azul Céu', 'valor' => 11.40],
                ],
            ],
            [
                'nome' => 'Cabo de Rede Cat6',
                'preco' => 3.75,
                'unidade_medida' => 'M',
                'itens' => [],
            ],
        ];

        foreach ($products as $dados) {
            $itens = $dados['itens'];
            unset($dados['itens']);

            $product = Product::create($dados);
            $product->itens()->createMany($itens);
        }
    }
}
