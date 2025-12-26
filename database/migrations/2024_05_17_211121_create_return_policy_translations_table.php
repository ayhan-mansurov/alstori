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
        Schema::create('return_policy_translations', function (Blueprint $table) {
            $table->bigIncrements('id'); // Laravel 5.8+ использует bigIncrements() вместо increments()
            $table->string('locale')->index();

            // Внешний ключ к основной модели
            $table->bigInteger('return_policy_id')->unsigned()->nullable();
            $table->unique(['return_policy_id', 'locale']);
            $table->foreign('return_policy_id')->references('id')->on('return_policies')->onDelete('cascade');

            // Фактические поля, которые вы хотите перевести
            $table->string('title')->unique();
            $table->string('description');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('return_policy_translations');
    }
};
