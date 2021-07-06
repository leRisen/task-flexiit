<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');

            $table->string('color')->nullable()->virtualAs('`options`->>"$.color"');
            $table->string('height')->nullable()->virtualAs('`options`->>"$.height"');
            $table->string('weight')->nullable()->virtualAs('`options`->>"$.weight"');

            $table->json('options');
            $table->string('description');
            $table->bigInteger('price');

            $table->foreignId('user_id')->index()->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
