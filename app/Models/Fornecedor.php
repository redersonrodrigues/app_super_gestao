<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fornecedor extends Model
{
    use HasFactory, SoftDeletes;

    // ajuste do nome da tabela no banco
    protected $table = 'fornecedores';

    protected $fillable = ['nome', 'site', 'uf', 'email'];

    /**
     * Get all of the produtos for the Fornecedor
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function produtos(): HasMany
    {
        return $this->hasMany(Produto::class, 'fornecedor_id', 'id');
    }
}
