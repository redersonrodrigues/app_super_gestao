<?php

use App\Models\MotivoContato;
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
        Schema::create('motivo_contatos', function (Blueprint $table) {
            $table->id();
            $table->string('motivo_contato');
            $table->timestamps();
        });

        // poderia criar alguns dados com create
    //     MotivoContato::create('Duvida');
    //     MotivoContato::create('Elogio');
    //     MotivoContato::create('Reclamação');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('motivo_contatos');
    }
};
