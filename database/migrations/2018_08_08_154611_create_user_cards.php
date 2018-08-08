<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserCards extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mp_user_cards', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';

            $table->increments('id');
            $table->integer('user_id')->default(0);
            $table->string('phone')->nullable();
            $table->boolean('gender')->default(true);
            $table->string('reg_ip')->nullable();
            $table->string('last_visit_ip')->nullable();
            $table->dateTime('last_visit_date')->nullable();
            $table->integer('country_id')->default(0);
            $table->text('address')->nullable();
            $table->dateTime('created')->nullable();
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
        Schema::dropIfExists('mp_user_cards');        
    }
}
