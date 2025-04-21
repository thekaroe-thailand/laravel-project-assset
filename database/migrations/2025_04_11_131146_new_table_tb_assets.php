<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //
        Schema::create('tb_assets', function(Blueprint $table) {
            $table->id();
            $table->integer('asset_categories_id');
            $table->string('name');
            $table->integer('price');
            $table->string('detail');
            $table->string('contact');
            $table->enum('status', ['normal', 'sale', 'cancel']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
