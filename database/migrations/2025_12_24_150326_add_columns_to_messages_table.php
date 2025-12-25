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
        Schema::table('messages', function (Blueprint $table) {
            $table->foreignId('sender_id')->after('conversation_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('produit_id')->nullable()->after('sender_id')->constrained('produits')->onDelete('set null');
            $table->boolean('is_read')->default(false)->after('produit_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('messages', function (Blueprint $table) {
            $table->dropForeign(['sender_id']);
            $table->dropForeign(['produit_id']);
            $table->dropColumn(['sender_id', 'produit_id', 'is_read']);
        });
    }
};
