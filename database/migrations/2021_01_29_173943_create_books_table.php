<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date');
            $table->string('name');
            $table->string('suitable_for');
            $table->string('publish_year', 5)->nullable();
            $table->bigInteger('author_id')->nullable();
            $table->bigInteger('category_id')->nullable();
            $table->integer('quantity');
            $table->string('donation')->nullable();
            $table->string('donar')->nullable();
            $table->string('photo')->nullable();
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
        Schema::dropIfExists('books');
    }
}
