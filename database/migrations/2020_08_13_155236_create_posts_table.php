<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();

            $table->integer('user_id')->unsigned();
            $table->integer('category_id')->unsigned();

            $table->string('name',100);
            $table->string('slug',150)->unique();

            $table->string('metadescrip',200)->nullable();
            $table->string('keywords',200)->nullable();
            $table->text('body')->nullable();

            $table->enum('status',['PUBLISHED','DRAFT'])->default('DRAFT');

            $table->string('imgdir',100)->nullable();

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
        Schema::dropIfExists('posts');
    }
}
