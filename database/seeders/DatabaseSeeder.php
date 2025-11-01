<?php

namespace Database\Seeders;

use Database\Seeders\Restaurant\RestKitchenSectionSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PermissionSeeder::class);
        $this->call(CreateAdminSeeder::class);
        // $this->call(LanguageSeeder::class);
        // $this->call(JoinUsSeeder::class);
        // $this->call(AreaSeeder::class);
        // $this->call(CategorySeeder::class);
        // $this->call(CountrySeeder::class);
        // $this->call(ColorSeeder::class);
        // $this->call(learnAboutSeeder::class);
        // $this->call(TournamentInformationSeeder::class);
        // $this->call(TournamentRegulationSeeder::class);
        // $this->call(GeneralConditionSeeder::class);
        // $this->call(ChildSafetyPolicySeeder::class);
        // $this->call(LatestVideoSeeder::class);
        // $this->call(ContactUsSeeder::class);
        // $this->call(AboutUsSeeder::class);
        // $this->call(HistorySeeder::class);
        // $this->call(VisionSeeder::class);
        // $this->call(MissionSeeder::class);
        // $this->call(AboutChampionSeeder::class);
        // $this->call(PopupAdSeeder::class);
    }
}
