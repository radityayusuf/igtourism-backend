<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\ExperienceCategory;
use App\Models\Experience;
use App\Models\Destination;
use Illuminate\Support\Str;

class ExperienceSeeder extends Seeder {
    public function run(): void {
        $destinations = Destination::all();
        $categoriesData = [
            ["name" => "Wisata Kuliner", "icon" => "lucide-utensils"],
            ["name" => "Warisan Budaya", "icon" => "lucide-landmark"],
            ["name" => "Trekking Alam", "icon" => "lucide-mountain"],
            ["name" => "Workshop Pengrajin", "icon" => "lucide-brush"],
            ["name" => "Farm-to-Table", "icon" => "lucide-tractor"],
        ];
        $categories = [];
        foreach ($categoriesData as $data) {
            $categories[] = ExperienceCategory::create(["name" => $data["name"], "slug" => Str::slug($data["name"]), "icon" => $data["icon"], "description" => "Kategori ".$data["name"]]);
        }
        $experiencesData = [
            ["name" => "Belajar Membatik", "category_id" => $categories[3]->id, "image" => "seeders/experiences/batik.webp", "price" => 250000],
            ["name" => "Trekking Hutan Tropis", "category_id" => $categories[2]->id, "image" => "seeders/experiences/trekking.webp", "price" => 350000],
            ["name" => "Mencicipi Kopi Tradisional", "category_id" => $categories[0]->id, "image" => "seeders/experiences/coffee_tasting.webp", "price" => 150000],
            ["name" => "Menonton Tari Kecak", "category_id" => $categories[1]->id, "image" => "seeders/experiences/kecak.webp", "price" => 200000],
            ["name" => "Snorkeling Terumbu Karang", "category_id" => $categories[2]->id, "image" => "seeders/experiences/snorkeling.webp", "price" => 450000],
        ];
        foreach ($experiencesData as $i => $data) {
            Experience::create(["name" => $data["name"], "slug" => Str::slug($data["name"]), "category_id" => $data["category_id"], "destination_id" => $destinations[$i % count($destinations)]->id, "description" => "Pengalaman luar biasa: " . $data["name"], "duration" => rand(2, 6)." Jam", "price" => $data["price"], "image" => $data["image"], "gallery" => json_encode([$data["image"]]), "is_featured" => true]);
        }
    }
}