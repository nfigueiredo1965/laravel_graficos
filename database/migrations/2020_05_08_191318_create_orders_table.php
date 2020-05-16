<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id'); // usuario que fez a compra
            $table->foreign('user_id')
                        ->references('id')
                        ->on('users')
                        ->onDelete('cascade');
            $table->double('total',10,2);
            $table->string('identify',191)->unique(); // identificador unico do pedido
            $table->string('core',191)->unique(); //codigo do pedido;
            $table->enum('status',[1,2,3,4,5,6,7,8,9]); //status dos pagamentos
            $table->enum('payment_method',[1,2,3,4,5,6,7]); //metodo de pagamento
            $table->date('date'); //data da realização do pedido
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
