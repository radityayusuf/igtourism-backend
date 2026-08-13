<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder {
    public function run(): void {
        $this->call([
            RegionSeeder::class,
            GiProductSeeder::class,
            ExperienceSeeder::class,
            GastronomySeeder::class,
            ArticleSeeder::class,
            PassportSeeder::class,
            JourneySeeder::class,
            MiscSeeder::class,
        ]);
    }
}