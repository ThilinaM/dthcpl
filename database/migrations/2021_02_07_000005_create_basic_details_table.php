<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBasicDetailsTable extends Migration
{
    public function up()
    {
        Schema::create('basic_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->longText('description')->nullable();
            $table->boolean('sms_serviceon')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
