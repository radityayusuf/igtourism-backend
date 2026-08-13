<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Milestone;
use Illuminate\Support\Str;

class PassportSeeder extends Seeder {
    public function run(): void {
        $milestonesData = [
            ["name" => "Coffee Connoisseur", "icon" => "lucide-award text-yellow-500"],
            ["name" => "Culture Explorer", "icon" => "lucide-compass text-slate-400"],
            ["name" => "First Journey", "icon" => "lucide-star text-amber-700"],
            ["name" => "Bali Visited", "icon" => "lucide-map-pin text-red-500"],
            ["name" => "Spicy Food Lover", "icon" => "lucide-flame text-orange-500"],
        ];
        foreach ($milestonesData as $data) {
            Milestone::create(["name" => $data["name"], "slug" => Str::slug($data["name"]), "description" => "Badge", "icon" => $data["icon"], "stamps_required" => rand(1, 10)]);
        }
    }
}