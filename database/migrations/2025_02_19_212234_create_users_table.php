<?php

use App\Models\AgeCategory;
use App\Models\Area;
use App\Models\Category;
use App\Models\Club;
use App\Models\Country;
use App\Models\learnAbout;
use App\Models\OutfitColor;
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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('manager_name');
            $table->string('street_and_number')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('city')->nullable();
            $table->string('shirt_type')->nullable();
            $table->string('shirt_color')->nullable();
            $table->string('secondary_color')->nullable();
            $table->string('trousers_color')->nullable();
            $table->string('phone');
            $table->string('preferred_room_type')->nullable();
            $table->string('preferred_hotel')->nullable();
            $table->string('password');
            $table->string('email')->unique();
            $table->foreignIdFor(Club::class, 'club_id')->nullable();
            $table->foreignIdFor(AgeCategory::class, 'age_category_id')->nullable();
            // $table->foreignIdFor(OutfitColor::class, 'outfit_color_id');
            $table->foreignIdFor(Country::class, 'country_id');
            $table->foreignIdFor(Area::class, 'area_id')->nullable();
            $table->foreignIdFor(Category::class, 'category_id')->nullable();
            $table->foreignIdFor(learnAbout::class, 'learn_about_id');
            $table->boolean('status')->default(true);
            $table->boolean('is_approved')->nullable();
            $table->integer('number_of_persons')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
