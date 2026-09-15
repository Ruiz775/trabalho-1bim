<?php

namespace App\Http\Controllers;

use App\Models\ProductItens;
use Illuminate\Contracts\View\View;

class ProductItensController extends Controller
{
    /**
     * Lista todos os itens de composicao com o produto relacionado.
     */
    public function index(): View
    {
        $itens = ProductItens::with('product')->orderBy('product_id')->get();

        return view('product_itens.index', compact('itens'));
    }
}
