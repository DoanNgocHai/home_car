<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->string('email', 50)->unique();
            $table->string('password');
            $table->string('avatar', 255)->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('address', 255)->nullable();
            $table->string('phone', 10)->nullable();
            $table->integer('post_count')->nullable();
            $table->string('role');
            $table->timestamps();
        });

        Schema::create('brands', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255);
            $table->string('logo', 255)->nullable();
            $table->Integer('year_establishment')->nullable();
            $table->timestamps();
        });
        // kieu dang
        Schema::create('figures', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255);
            $table->string('slug', 255);
            $table->string('thumbnail', 255)->nullable();
            $table->timestamps();
        });
        // hop dang
        Schema::create('gears', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255);
            $table->string('slug', 255);
            $table->string('thumbnail', 255)->nullable();
            $table->timestamps();
        });

        Schema::create('colors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255);
            $table->string('slug', 255);
            $table->string('thumbnail', 255)->nullable();
            $table->timestamps();
        });

        Schema::create('cars', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 255);
            $table->string('slug', 255);
            $table->integer('price')->default(0);

            $table->unsignedInteger('brand_id');
            $table->unsignedInteger('figure_id');
            $table->unsignedInteger('gear_id');
            $table->unsignedInteger('color_id');
            $table->unsignedInteger('user_id');

            $table->integer('year')->default(0);
            $table->integer('odo')->default(0);
            $table->string('description', 255)->nullable();
            $table->string('thumbnail', 255)->nullable();
            $table->json('images')->nullable();
            $table->boolean('status')->default(0);

            $table->timestamps();

            $table->foreign('brand_id')->references('id')->on('brands');
            $table->foreign('figure_id')->references('id')->on('figures');
            $table->foreign('gear_id')->references('id')->on('gears');
            $table->foreign('color_id')->references('id')->on('colors');
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::create('favorites', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('car_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('car_id')->references('id')->on('cars');
        });

        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('car_id');
            $table->Integer('status');
            $table->boolean('seller_status');
            $table->boolean('buyer_status');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('car_id')->references('id')->on('cars');
        });

        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('car_id');
            $table->string('reason');
            $table->string('description');
            $table->integer('status')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('car_id')->references('id')->on('cars');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reports');
        Schema::dropIfExists('transactions');
        Schema::dropIfExists('favorites');
        Schema::dropIfExists('cars');
        Schema::dropIfExists('colors');
        Schema::dropIfExists('gears');
        Schema::dropIfExists('figures');
        Schema::dropIfExists('brands');
    }
};
