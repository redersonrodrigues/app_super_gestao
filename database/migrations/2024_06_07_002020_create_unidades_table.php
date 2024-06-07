<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('unidades', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('unidade', 5);
            $table->string('descricao', 30);
        });

        // adicionar relacionamento com a tabela produtos
        Schema::table('produtos', function (Blueprint $table) {
            $table->unsignedBigInteger('unidade_id');

            $table->foreign('unidade_id')->references('id')->on('unidades');
        });

        // adicionar relacionamento com a tabela produto_detalhes
        Schema::table('produto_detalhes', function (Blueprint $table) {
            $table->unsignedBigInteger('unidade_id');

            $table->foreign('unidade_id')->references('id')->on('unidades');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        /***** remover na ordem inversa de criação *****/
        // remover relacionamento com a tabela produto_detalhes
        Schema::table('produto_detalhes', function (Blueprint $table) {
            // remover a fk
            $table->dropforeign('produto_detalhes_unidade_id_foreign'); // [tabela]_[coluna]_foreign

            // remover a coluna unidade_id

            $table->dropColumn('unidade_id');
        });
        // remover relacionamento com a tabela produtos
        Schema::table('produtos', function (Blueprint $table) {
            // remover a fk
            $table->dropforeign('produtos_unidade_id_foreign'); // [tabela]_[coluna]_foreign

            // remover a coluna unidade_id

            $table->dropColumn('unidade_id');
        });

        // por último remove a tabela
        Schema::dropIfExists('unidades');
    }
};
