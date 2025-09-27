<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
public function up()
{
    Schema::create('product_sells', function (Blueprint $table) {
        $table->id();
        
        // Mantemos a referência ao produto
        $table->foreignId('product_id')->constrained()->onDelete('cascade');

        // ADICIONAMOS OS DADOS DO CLIENTE DIRETAMENTE AQUI
        $table->string('client_name');
        $table->string('client_email');
        $table->string('client_cpf');

        // O resto dos dados da venda
        $table->date('sale_date');
        $table->integer('quantity');
        $table->decimal('total_price', 10, 2);
        $table->decimal('discount', 10, 2)->nullable();
        $table->string('status')->default('Aprovado');
        $table->timestamps();
    });
}
};
