<?php

use App\Models\ClubTeam;
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
        Schema::create('club_matches', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(ClubTeam::class, 'club1_id')->nullable();
            $table->foreignIdFor(ClubTeam::class, 'club2_id')->nullable();
            $table->string('match_link')->nullable();
            $table->dateTime('match_date')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('club_matches');
    }
};
