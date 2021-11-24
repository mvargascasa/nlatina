<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->id();

            $table->string('fname',50);
            $table->string('lname',50)->nullable();
            $table->string('tlf',20);
            $table->string('email',100)->nullable();
            $table->string('interest',30)->nullable();
            $table->string('status',30)->nullable();
            $table->string('message',30)->nullable();
            $table->string('comment',30)->nullable();
            $table->string('city',30)->nullable();
            $table->string('iploc',20)->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('assig_id')->nullable();
            $table->integer('assig_by')->nullable();
            $table->integer('updat_by')->nullable();
            $table->string('provider',20)->nullable();
            $table->string('provider_id',100)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leads');
    }
}
