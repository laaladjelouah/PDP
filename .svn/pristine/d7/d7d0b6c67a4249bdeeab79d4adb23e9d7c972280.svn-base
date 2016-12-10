<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentHistoryTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('PaymentHistory',
                function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->text('expiration_date');
            $table->text('card_owner');
            $table->bigInteger('credit_card_number');
            $table->integer('cvv_code');
            $table->text('old_amount');
            $table->text('added_money');
            $table->text('new_amount');
            $table->text('invoice_number');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('PaymentHistory');
    }

}
