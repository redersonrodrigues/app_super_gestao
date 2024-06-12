<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Produto extends Model
{
    use HasFactory;
    protected $fillable = ['nome', 'descricao','peso','unidade_id'];

    /**
     * Get the produtoDetalhe associated with the Produto
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function produtoDetalhe(): HasOne
    {
        return $this->hasOne(ProdutoDetalhe::class);
    }
}
