<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create2DatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_2__datas', function (Blueprint $table) {
            $table->integer('id')->unsigned()->index('id');

            $table->foreign('id')
                ->references('id')->on("_2__charts")
                ->onDelete('cascade')->onUpdate('cascade');

            $table->double('value', 15, 8);

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
        Schema::dropIfExists('_2__datas');
    }
}
