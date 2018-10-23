<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create5ChartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_5__charts', function (Blueprint $table) {
            $table->integer('channel_id')->unsigned()->unique('channel_id');

            $table->foreign('channel_id')
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
        Schema::dropIfExists('_5__charts');
    }
}
