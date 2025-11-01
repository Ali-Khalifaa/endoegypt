<?php

use App\Models\Color;
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
        Schema::create('outfit_colors', function (Blueprint $table) {
            $table->id();
            $table->string('shirt_type');
            $table->foreignIdFor(Color::class, 'shirt_color_id');
            $table->foreignIdFor(Color::class, 'secondary_color_id');
            $table->foreignIdFor(Color::class, 'trousers_color_id');
            $table->string('image');
            $table->boolean('status')->default(true);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('outfit_colors');
    }
};
