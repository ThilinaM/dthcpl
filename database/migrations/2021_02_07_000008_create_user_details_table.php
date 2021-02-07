<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserDetailsTable extends Migration
{
    public function up()
    {
        Schema::create('user_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('nic')->nullable();
            $table->string('library_card_no')->nullable();
            $table->string('mobile')->nullable();
            $table->string('address')->nullable();
            $table->boolean('sms_send')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
