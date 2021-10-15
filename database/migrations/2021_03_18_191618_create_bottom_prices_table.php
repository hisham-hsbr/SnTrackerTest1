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
            $table->text('division');
            $table->text('brand');
            $table->DECIMAL('fb', 15, 2);
            $table->DECIMAL('sb', 15, 2);
            $table->DECIMAL('tb', 15, 2);
            $table->DECIMAL('lb', 15, 2);
            $table->DECIMAL('rt', 15, 2);

            $table->integer('division_id')->unsigned()->index();

            $table->foreign('division_id')->references('id')->on('divisions')->onDelete('cascade');
            $table->boolean('status')->default(true);

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
