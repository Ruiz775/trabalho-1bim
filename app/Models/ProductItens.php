<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductItens extends Model
{
    use HasFactory;

    /**
     * Tabela associada ao model.
     *
     * @var string
     */
    protected $table = 'product_itens';

    /**
     * Atributos que podem ser preenchidos em massa.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'product_id',
        'quantidade',
        'cor',
        'valor',
    ];

    /**
     * Conversao de tipos dos atributos.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'quantidade' => 'integer',
        'valor' => 'decimal:2',
    ];

    /**
     * Produto ao qual o item pertence.
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
