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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->unsignedBigInteger('cate_id')->nullable();// kiểu dữ liệu không âm
            $table->decimal('price', 10, 2)->nullable();
            $table->text('content')->nullable();
            $table->string('image')->nullable();
            $table->integer('status')->nullable();
            $table->timestamps();
            // khóa ngoại
            $table->foreign('cate_id')->references('id')->on('categories')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
