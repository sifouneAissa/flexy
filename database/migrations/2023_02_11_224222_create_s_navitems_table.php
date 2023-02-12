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
        Schema::create('s_navitems', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('parent_id')->nullable();
            $table->string('icon')->nullable();
            $table->boolean('isNew')->nullable();
            $table->string('route')->nullable();
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
        Schema::dropIfExists('s_navitems');
    }
};
