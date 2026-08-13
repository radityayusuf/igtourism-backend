<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Restaurant;
use App\Models\Chef;
use App\Models\Recipe;
use App\Models\Destination;
use Illuminate\Support\Str;

class GastronomySeeder extends Seeder {
    public function run(): void {
        $destination = Destination::first() ?? Destination::create(["province_id" => 1, "name" => "Bali", "slug" => "bali-g"]);
        
        $restaurantsData = [
            ["name" => "Fine Dining Bali", "image" => "seeders/restaurants/fine_dining.webp"],
            ["name" => "Joglo Javanese", "image" => "seeders/restaurants/joglo.webp"],
            ["name" => "Seafood Beach", "image" => "seeders/restaurants/seafood.webp"],
            ["name" => "Modern Cafe", "image" => "seeders/restaurants/modern_cafe.webp"],
            ["name" => "Farm to Table", "image" => "seeders/restaurants/farm_to_table.webp"],
        ];
        $restaurants = [];
        foreach ($restaurantsData as $data) {
            $restaurants[] = Restaurant::create(["destination_id" => $destination->id, "name" => $data["name"], "slug" => Str::slug($data["name"]), "description" => "Restoran ".$data["name"], "address" => "Jalan No ".rand(1,100), "image" => $data["image"]]);
        }
        
        $chefsData = [
            ["name" => "Executive Chef", "image" => "seeders/chefs/executive.webp"],
            ["name" => "Female Wok Chef", "image" => "seeders/chefs/wok.webp"],
            ["name" => "Traditional Cook", "image" => "seeders/chefs/traditional.webp"],
            ["name" => "Pastry Chef", "image" => "seeders/chefs/pastry.webp"],
            ["name" => "Street Vendor", "image" => "seeders/chefs/street_vendor.webp"],
        ];
        $chefs = [];
        foreach ($chefsData as $index => $data) {
            $chefs[] = Chef::create(["restaurant_id" => $restaurants[$index]->id, "name" => $data["name"], "slug" => Str::slug($data["name"]), "bio" => "Chef berpengalaman", "specialty" => "Nusantara", "image" => $data["image"]]);
        }
        
        $recipesData = [
            ["name" => "Nasi Goreng", "image" => "seeders/recipes/nasi_goreng.webp"],
            ["name" => "Beef Rendang", "image" => "seeders/recipes/rendang.webp"],
            ["name" => "Sate Ayam", "image" => "seeders/recipes/sate.webp"],
            ["name" => "Soto Ayam", "image" => "seeders/recipes/soto.webp"],
            ["name" => "Martabak", "image" => "seeders/recipes/martabak.webp"],
        ];
        foreach ($recipesData as $data) {
            Recipe::create(["name" => $data["name"], "slug" => Str::slug($data["name"]), "description" => "Resep ".$data["name"], "ingredients" => json_encode(["Bahan 1"]), "instructions" => json_encode(["Cara 1"]), "image" => $data["image"], "prep_time" => rand(15, 60), "cook_time" => rand(20, 120), "servings" => rand(2, 6)]);
        }
    
        $foodPairings = [
            ["image" => "seeders/food_pairings/cake_coffee.webp"],
            ["image" => "seeders/food_pairings/padang_tea.webp"],
            ["image" => "seeders/food_pairings/klepon_ginger.webp"],
            ["image" => "seeders/food_pairings/fish_mocktail.webp"],
            ["image" => "seeders/food_pairings/duck_beer.webp"],
        ];
        foreach ($foodPairings as $data) {
            \Illuminate\Support\Facades\DB::table('food_pairings')->insert(["product_a_id" => 1, "product_b_id" => 2, "description" => "Food Pairing", "image" => $data["image"]]);
        }
        
        $gastronomyRoutes = [
            ["name" => "Sumatra Trail", "image" => "seeders/gastronomy_routes/sumatra_trail.webp"],
            ["name" => "Bali Coffee", "image" => "seeders/gastronomy_routes/bali_coffee.webp"],
            ["name" => "Jakarta Street", "image" => "seeders/gastronomy_routes/jakarta_street.webp"],
            ["name" => "Maluku Spice", "image" => "seeders/gastronomy_routes/maluku_spice.webp"],
            ["name" => "Java Royal", "image" => "seeders/gastronomy_routes/java_royal.webp"],
        ];
        foreach ($gastronomyRoutes as $data) {
            \Illuminate\Support\Facades\DB::table('gastronomy_routes')->insert(["name" => $data["name"], "slug" => Str::slug($data["name"]), "description" => "Rute ".$data["name"], "image" => $data["image"]]);
        }
    }
}