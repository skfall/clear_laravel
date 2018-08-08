<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mp_settings', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';

            $table->increments('id');
            $table->string('sitename')->nullable();
            $table->string('email')->nullable();
            $table->string('phones')->nullable();
            $table->text('address')->nullable();
            $table->string('fb_link')->nullable();
            $table->string('vk_link')->nullable();
            $table->string('tw_link')->nullable();
            $table->string('gl_link')->nullable();
            $table->float('lat', 8, 4)->default(0);
            $table->float('lng', 8, 4)->default(0);
            $table->boolean('site_index')->default(false);
            $table->text('copyright')->nullable();
            $table->text('top_script')->nullable();
            $table->text('bot_script')->nullable();
            $table->time('shipment_prev_deadline')->nullable();
            $table->time('shipment_curr_deadline')->nullable();
            $table->time('return_prev_deadline')->nullable();
            $table->time('return_curr_deadline')->nullable();
            $table->float('fee', 8, 2)->default(0);
            $table->string('smtp_host')->nullable();
            $table->integer('smtp_port')->default(0);
            $table->string('smtp_login')->nullable();
            $table->string('smtp_password')->nullable();
            $table->dateTime('modified')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mp_settings');
    }
}
