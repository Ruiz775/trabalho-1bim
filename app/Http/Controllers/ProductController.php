<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Contracts\View\View;

class ProductController extends Controller
{
    /**
     * Lista todos os produtos com seus itens de composicao.
     */
    public function index(): View
    {
        $products = Product::with('itens')->orderBy('nome')->get();

        return view('products.index', compact('products'));
    }

    /**
     * Exibe um produto e seus itens.
     */
    public function show(Product $product): View
    {
        $product->load('itens');

        return view('products.show', compact('product'));
    }
}
