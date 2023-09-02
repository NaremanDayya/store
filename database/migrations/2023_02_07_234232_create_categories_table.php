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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parent_id')
            ->nullable()
            ->constrained('categories','id')
            ->nullOnDelete();
            $table->string('name');//VARCHAR(64000,..)
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->enum('status' ,['active','archived']);
            //عنا هدول ال3 للنظام الشجري وال nodes
            $table->unsignedInteger('left_id');
            $table->unsignedInteger('right_id');
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
        Schema::dropIfExists('categories');
    }
};
