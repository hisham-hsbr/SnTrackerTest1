<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branches', function (Blueprint $table) {
             $table->id();
            $table->string('code')->unique();
            $table->string('name');
            $table->string('slug');
            $table->text('body')->nullable();
            $table->string('image')->nullable();

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
        Schema::dropIfExists('branches');
    }
}
