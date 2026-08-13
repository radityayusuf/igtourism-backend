<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Journey;
use App\Models\User;
use Illuminate\Support\Str;

class JourneySeeder extends Seeder {
    public function run(): void {
        $usersData = [
            ["name" => "Asian Male", "email" => "user1@mail.com", "avatar" => "seeders/avatars/asian_male.webp"],
            ["name" => "Asian Female", "email" => "user2@mail.com", "avatar" => "seeders/avatars/asian_female.webp"],
            ["name" => "Older Male", "email" => "user3@mail.com", "avatar" => "seeders/avatars/older_male.webp"],
            ["name" => "Food Blogger", "email" => "user4@mail.com", "avatar" => "seeders/avatars/food_blogger.webp"],
            ["name" => "Surfer", "email" => "user5@mail.com", "avatar" => "seeders/avatars/surfer.webp"],
        ];
        foreach ($usersData as $data) {
            User::create(["name" => $data["name"], "email" => $data["email"], "password" => bcrypt("password"), "avatar" => $data["avatar"]]);
        }
        
        $journeysData = [
            ["name" => "Java Train Journey", "image" => "seeders/journeys/java_train.webp"],
            ["name" => "Phinisi Boat Sailing", "image" => "seeders/journeys/phinisi_boat.webp"],
            ["name" => "Bali Roadtrip", "image" => "seeders/journeys/bali_roadtrip.webp"],
            ["name" => "Cultural Tour Map", "image" => "seeders/journeys/cultural_map.webp"],
            ["name" => "Asian Night Market", "image" => "seeders/journeys/asian_night_market.webp"],
        ];
        foreach ($journeysData as $data) {
            Journey::create(["name" => $data["name"], "slug" => Str::slug($data["name"]), "description" => "Deskripsi ".$data["name"], "duration_days" => rand(1, 5), "price_from" => rand(500000, 2000000), "image" => $data["image"]]);
        }
    }
}