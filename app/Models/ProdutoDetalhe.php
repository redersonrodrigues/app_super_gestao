<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProdutoDetalhe extends Model
{
    use HasFactory;
    protected $fillable =[
        'produto_id', 'comprimento', 'largura', 'altura', 'unidade_id'
    ];

    /**
     * Get the produto that owns the ProdutoDetalhe
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function produto(): BelongsTo
    {
        return $this->belongsTo(Produto::class);
    }
}
