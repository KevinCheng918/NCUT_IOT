<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChannelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('channels', function (Blueprint $table) {

            $table->increments('id');

            $table->integer('user_id')->unsigned()->index('user_id');

            $table->foreign('user_id')
            ->references('id')->on('users')
            ->onDelete('cascade')->onUpdate('cascade');

            $table->string('readkey', 100)->unique('readkey')->nullable();

            $table->string('writekey', 100)->unique('writekey')->nullable();

            $table->string('name', 100);

            $table->string('description', 100)->nullable();

            $table->boolean('is_show_video')->default(false);

            $table->string('video_url', 500)->nullable();

            $table->integer('update_count')->unsigned()->default(0);

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
        Schema::dropIfExists('channels');
    }
}
