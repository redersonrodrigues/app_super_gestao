<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Pedido extends Model
{
    use HasFactory;

    /**
     * The produtos that belong to the Pedido
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function produtos(): BelongsToMany
    {
        // return $this->belongsToMany(Produto::class, 'pedidos_produtos'); // modo padrão laravel
        return $this->belongsToMany(Item::class, 'pedidos_produtos', 'pedido_id', 'produto_id')->withPivot('created_at','updated_at');
        /*
        Esta implementação é quando usamos nomes diferentes do padrão laravel:
        passos:
        1 - Modelo do Relacionamento NxN em relação o modelo que estamos implememtamdo = Item::class
        2 - É a tabela auxiliar que armazena os registros de armazenamento = 'pedidos_produtos'
        3 - Representa o nome da fk da tabela mapeada pelo modelo na tabela de relacionamento = 'pedido_id'
        4 - Representa o nome da fk da tabela mapeada pelo model utilizado no relacionamento que estamos implementando = 'produto_id'
        */
    }
}
