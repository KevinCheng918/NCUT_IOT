<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create3ChartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_3__charts', function (Blueprint $table) {
            $table->integer('id')->unsigned()->primary('id');

            $table->foreign('id')
                ->references('id')->on('channels')
                ->onDelete('cascade')->onUpdate('cascade');

            $table->string('name', 100);

            $table->string('type', 100)->default('line');

            $table->boolean('is_dynamic')->default(true);

            $table->boolean('is_rounding')->default(false);

            $table->integer('results')->unsigned()->default(5);

            $table->timestamps();

            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('_3__charts');
    }
}
