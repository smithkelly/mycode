<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessageStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('message_statuses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('to');
            $table->string('messageId');
            $table->string('status');
            $table->integer('group_sms_id')->unsigned();
            $table->timestamps();

            $table->foreign('group_sms_id')->references('id')->on('group_sms')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('message_statuses');
    }
}
