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
        Schema::create('lotes', function (Blueprint $table) {
            $table->id();
            $table->string('status')->default('disponível');
            $table->string('vendedor')->nullable();
            $table->string('comprador')->nullable();
            $table->timestamp('status_date');
            $table->unsignedBigInteger('quadra_id');
            $table->unsignedBigInteger('empreendimento_id');
            $table->timestamps();

            $table->foreign('quadra_id')
            ->references('id')->on('quadras')
            ->cascadeOnDelete();

            $table->foreign('empreendimento_id')
            ->references('id')->on('empreendimentos')
            ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lotes');
    }
};
