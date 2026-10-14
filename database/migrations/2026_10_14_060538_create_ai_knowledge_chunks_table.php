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
        Schema::create('ai_knowledge_chunks', function (Blueprint $table) {
            $table->id();
            $table->string('layer', 20)->index();
            $table->string('tenant_id', 100)->nullable()->index();
            $table->string('category', 50)->index();
            $table->string('title');
            $table->text('content');
            $table->json('keywords')->nullable();
            $table->string('status', 20)->default('approved')->index();
            $table->unsignedInteger('version')->default(1);
            $table->integer('priority')->default(0);
            $table->json('metadata')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ai_knowledge_chunks');
    }
};
