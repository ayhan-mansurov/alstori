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
        Schema::create('privacy_policy_translations', function (Blueprint $table) {
            $table->bigIncrements('id'); // Laravel 5.8+ использует bigIncrements() вместо increments()
            $table->string('locale')->index();

            // Внешний ключ к основной модели
            $table->bigInteger('privacy_policy_id')->unsigned()->nullable();
            $table->unique(['privacy_policy_id', 'locale']);
            $table->foreign('privacy_policy_id')->references('id')->on('privacy_policies')->onDelete('cascade');

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
        Schema::dropIfExists('privacy_policy_translations');
    }
};
