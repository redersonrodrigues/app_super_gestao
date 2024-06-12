<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Item extends Model
{
    use HasFactory;
    // ajuste para usar tabela produtos do banco de dados
    protected $table = 'produtos';

    protected $fillable = ['nome', 'descricao', 'peso', 'unidade_id','fornecedor_id'];

    /**
     * Get the produtoDetalhe associated with the Produto
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function itemDetalhe(): HasOne // não mudou ṕara item para não ter que mudar na view
    {
        return $this->hasOne(ItemDetalhe::class, 'produto_id','id');
    }

    /**
     * Get the fornecedor that owns the Item
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function fornecedor(): BelongsTo
    {
        return $this->belongsTo(Fornecedor::class,'fornecedor_id', 'id');
    }

    /**
     * The pedidos that belong to the Item
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function pedidos(): BelongsToMany
    {
        return $this->belongsToMany(Pedido::class, 'pedidos_produtos', 'produto_id', 'pedido_id');
    }
}
