<?php

use App\Models\ChampionAward;
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
        Schema::create('champion_awards', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->foreignIdFor(ChampionAward::class, 'champion_award_id')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('champion_awards');
    }
};
