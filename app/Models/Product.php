<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    /**
     * Atributos que podem ser preenchidos em massa.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nome',
        'preco',
        'unidade_medida',
    ];

    /**
     * Conversao de tipos dos atributos.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'preco' => 'decimal:2',
    ];

    /**
     * Itens de composicao do produto.
     */
    public function itens(): HasMany
    {
        return $this->hasMany(ProductItens::class);
    }
}
