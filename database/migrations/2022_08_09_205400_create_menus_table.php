<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('parent_id')->index()->nullable();
            $table->string('name');
            $table->enum('type', ['header', 'menu', 'submenu'])->index();
            $table->string('classification')->nullable();
            $table->string('icon')->nullable();
            $table->string('route')->nullable();
            $table->unsignedTinyInteger('classification_order')->nullable()->index();
            $table->unsignedTinyInteger('classification_inner_order')->nullable()->index();
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
        Schema::dropIfExists('menus');
    }
}
