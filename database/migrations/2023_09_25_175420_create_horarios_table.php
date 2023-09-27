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
        Schema::create('horarios', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('userid')->unsigned();
            $table->foreign('userid')->references('id')->on('funcionarios')->onDelete('cascade');
            $table->date('dia');
            $table->Time('entrada');
            $table->Time('saidaAlmoco');
            $table->Time('retornoAlmoco');
            $table->Time('saida');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('horarios');
    }
};
