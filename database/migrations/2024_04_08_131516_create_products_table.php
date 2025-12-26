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
            $table->string('slug')->unique();
            $table->string('SKU')->unique();

            $table->decimal('regular_price');
            $table->decimal('sale_price')->nullable();

            $table->unsignedInteger('quantity')->default(1);
            $table->enum('stock', ['active', 'inactive']);
            $table->enum('status', ['active', 'inactive']);

            $table->boolean('featured')->default(false);
            $table->boolean('slide')->default(false);
            $table->boolean('weekend')->default(false);

            $table->string('image');
            $table->text('images')->nullable();

            $table->foreignId('sub_category_id')->constrained()->onDelete('cascade')->nullable();
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            $table->timestamps();
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
