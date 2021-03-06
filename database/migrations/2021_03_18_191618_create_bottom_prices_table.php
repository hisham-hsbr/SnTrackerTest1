<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBottomPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bottom_prices', function (Blueprint $table) {
            $table->id();
            $table->text('code');
            $table->text('name');

            $table->text('model');
            $table->integer('division_id')->unsigned()->index();
            $table->foreign('division_id')->references('id')->on('divisions')->onDelete('cascade');

            $table->integer('brand_id')->unsigned()->index();
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');



            $table->DECIMAL('fb', 15, 2);
            $table->DECIMAL('sb', 15, 2);
            $table->DECIMAL('tb', 15, 2);
            $table->DECIMAL('lb', 15, 2);
            $table->DECIMAL('rt', 15, 2);



            $table->boolean('status')->nullable();

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
        Schema::dropIfExists('bottom_prices');
    }
}
