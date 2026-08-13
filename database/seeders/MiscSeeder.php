<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class MiscSeeder extends Seeder {
    public function run(): void {
        $accs = [
            ["name" => "Bamboo Villa", "image" => "seeders/accommodations/bamboo_villa.webp", "type" => "villa"],
            ["name" => "Boutique Hotel", "image" => "seeders/accommodations/boutique_hotel.webp", "type" => "hotel"],
            ["name" => "Wooden Homestay", "image" => "seeders/accommodations/wooden_homestay.webp", "type" => "homestay"],
        ];
        $dest = \App\Models\Destination::first()->id ?? 1;
        foreach ($accs as $data) {
            \App\Models\Accommodation::create(["destination_id" => $dest, "name" => $data["name"], "slug" => Str::slug($data["name"]), "type" => $data["type"], "image" => $data["image"]]);
        }
        
        $markets = [
            ["name" => "Premium Batik Shirt", "image" => "seeders/accommodations/batik_shirt.webp"],
            ["name" => "Artisanal Coffee Bag", "image" => "seeders/accommodations/coffee_bag.webp"],
        ];
        foreach ($markets as $data) {
            \App\Models\MarketListing::create(["gi_product_id" => 1, "seller_name" => $data["name"], "description" => "Listing ".$data["name"], "price" => 150000, "currency" => "IDR", "image" => $data["image"]]);
        }
    }
}