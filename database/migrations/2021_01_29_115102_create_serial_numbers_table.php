<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSerialNumbersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('serial_numbers', function (Blueprint $table) {
            $table->id();
            $table->text('invoice');
            $table->text('invoiceSupplier');
            $table->date('date');
            $table->text('SerialNumber');
            // $table->unsignedBigInteger('product_id');
            // $table->foreign('product_id')->references('id')->on('products');
            $table->text('remark');

            $table->integer('CreatedBy')->unsigned()->index();
            $table->foreign('CreatedBy')->references('id')->on('admins')->onDelete('cascade');

            $table->integer('UpdatedBy')->unsigned()->index();
            $table->foreign('UpdatedBy')->references('id')->on('admins')->onDelete('cascade');

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
        Schema::dropIfExists('serial_numbers');
    }
}
