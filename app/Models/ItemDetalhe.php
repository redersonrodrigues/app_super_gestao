<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ItemDetalhe extends Model
{
    use HasFactory;
    // ajuste para usar tabela produto detalhes do banco de dados
    protected $table = 'produto_detalhes';

    protected $fillable =[
        'produto_id', 'comprimento', 'largura', 'altura', 'unidade_id'
    ];

    /**
     * Get the produto that owns the ProdutoDetalhe
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function item(): BelongsTo // não mudou ṕara item para não ter que mudar na view
    {
        return $this->belongsTo(Item::class,'produto_id','id');
    }
}
