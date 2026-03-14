<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique(); // ex: royal-saly
            $table->string('name');           // ex: Le Royal Saly
            $table->string('location');       // ex: Saly
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->boolean('active')->default(true);
            $table->timestamps();
        });

        // Ajouter hotel_id dans room_types
        Schema::table('room_types', function (Blueprint $table) {
            $table->foreignId('hotel_id')->nullable()->constrained('hotels')->nullOnDelete()->after('id');
        });
    }

    public function down(): void
    {
        Schema::table('room_types', function (Blueprint $table) {
            $table->dropForeign(['hotel_id']);
            $table->dropColumn('hotel_id');
        });

        Schema::dropIfExists('hotels');
    }
};
