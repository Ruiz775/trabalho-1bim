<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Cria um produto com um item de composicao para os testes.
     */
    private function criarProdutoComItem(): Product
    {
        $product = Product::create([
            'nome' => 'Cadeira Teste',
            'preco' => 899.90,
            'unidade_medida' => 'UN',
        ]);

        $product->itens()->create([
            'quantidade' => 5,
            'cor' => 'Azul',
            'valor' => 45.50,
        ]);

        return $product;
    }

    /**
     * @return void
     */
    public function test_a_pagina_de_produtos_lista_os_produtos_e_seus_itens()
    {
        $this->criarProdutoComItem();

        $response = $this->get('/produtos');

        $response->assertStatus(200);
        $response->assertSee('Cadeira Teste');
        $response->assertSee('R$ 899,90');
        $response->assertSee('Azul');
        $response->assertSee('R$ 45,50');
    }

    /**
     * @return void
     */
    public function test_a_pagina_de_itens_lista_os_itens_com_o_produto_relacionado()
    {
        $this->criarProdutoComItem();

        $response = $this->get('/itens');

        $response->assertStatus(200);
        $response->assertSee('Cadeira Teste');
        $response->assertSee('Azul');
    }

    /**
     * @return void
     */
    public function test_o_relacionamento_entre_product_e_product_itens()
    {
        $product = $this->criarProdutoComItem();

        $this->assertCount(1, $product->itens);
        $this->assertSame('Azul', $product->itens->first()->cor);
        $this->assertTrue($product->itens->first()->product->is($product));
    }
}
