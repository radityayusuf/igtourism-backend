<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Region;
use App\Models\Island;
use App\Models\Province;
use App\Models\Destination;
use Illuminate\Support\Str;

class RegionSeeder extends Seeder {
    public function run(): void {
        $regionsData = [
            ["name" => "Sumatera", "image" => "seeders/regions/sumatera.webp"],
            ["name" => "Jawa", "image" => "seeders/regions/jawa.webp"],
            ["name" => "Bali & Nusa Tenggara", "image" => "seeders/regions/bali_nusra.webp"],
            ["name" => "Kalimantan", "image" => "seeders/regions/kalimantan.webp"],
            ["name" => "Sulawesi & Indonesia Timur", "image" => "seeders/regions/timur.webp"],
        ];
        $regions = [];
        foreach ($regionsData as $data) {
            $regions[] = Region::create(["name" => $data["name"], "slug" => Str::slug($data["name"]), "description" => "Deskripsi wilayah " . $data["name"], "description_id" => "Deskripsi wilayah " . $data["name"], "image" => $data["image"]]);
        }
        
        $islandsData = [
            ["name" => "Pulau Samosir", "image" => "seeders/islands/samosir.webp"],
            ["name" => "Pulau Jawa", "image" => "seeders/islands/jawa.webp"],
            ["name" => "Pulau Bali", "image" => "seeders/islands/bali.webp"],
            ["name" => "Pulau Lombok", "image" => "seeders/islands/lombok.webp"],
            ["name" => "Pulau Komodo", "image" => "seeders/islands/komodo.webp"],
        ];
        $islands = [];
        foreach ($islandsData as $data) {
            $islands[] = Island::create(["name" => $data["name"], "slug" => Str::slug($data["name"]), "description" => "Deskripsi " . $data["name"], "image" => $data["image"]]);
        }
        
        $provincesData = [
            ["name" => "Sumatera Utara", "region_id" => $regions[0]->id, "island_id" => $islands[0]->id, "image" => "seeders/provinces/sumut.webp"],
            ["name" => "Jawa Tengah", "region_id" => $regions[1]->id, "island_id" => $islands[1]->id, "image" => "seeders/provinces/jateng.webp"],
            ["name" => "Bali", "region_id" => $regions[2]->id, "island_id" => $islands[2]->id, "image" => "seeders/provinces/bali.webp"],
            ["name" => "Nusa Tenggara Barat", "region_id" => $regions[2]->id, "island_id" => $islands[3]->id, "image" => "seeders/provinces/ntb.webp"],
            ["name" => "Nusa Tenggara Timur", "region_id" => $regions[2]->id, "island_id" => $islands[4]->id, "image" => "seeders/provinces/ntt.webp"],
        ];
        $provinces = [];
        foreach ($provincesData as $data) {
            $provinces[] = Province::create(["name" => $data["name"], "slug" => Str::slug($data["name"]), "region_id" => $data["region_id"], "island_id" => $data["island_id"], "description" => "Deskripsi Provinsi " . $data["name"], "image" => $data["image"]]);
        }
        
        $destinationsData = [
            ["name" => "Danau Toba", "province_id" => $provinces[0]->id, "image" => "seeders/destinations/toba.webp", "lat" => "2.6845", "lng" => "98.8588", "tagline" => "The Largest Volcanic Lake"],
            ["name" => "Candi Borobudur", "province_id" => $provinces[1]->id, "image" => "seeders/destinations/borobudur.webp", "lat" => "-7.6079", "lng" => "110.2038", "tagline" => "Ancient Buddhist Temple"],
            ["name" => "Pantai Kuta", "province_id" => $provinces[2]->id, "image" => "seeders/destinations/kuta.webp", "lat" => "-8.7180", "lng" => "115.1689", "tagline" => "Bali's Iconic Beach"],
            ["name" => "Gunung Rinjani", "province_id" => $provinces[3]->id, "image" => "seeders/destinations/rinjani.webp", "lat" => "-8.4112", "lng" => "116.4570", "tagline" => "Majestic Volcanic Peak"],
            ["name" => "Taman Nasional Komodo", "province_id" => $provinces[4]->id, "image" => "seeders/destinations/komodo.webp", "lat" => "-8.5500", "lng" => "119.4800", "tagline" => "Home of the Dragons"],
        ];
        foreach ($destinationsData as $data) {
            Destination::create(["name" => $data["name"], "slug" => Str::slug($data["name"]), "province_id" => $data["province_id"], "description" => "Destinasi wisata " . $data["name"], "tagline" => $data["tagline"], "image" => $data["image"], "gallery" => json_encode([$data["image"]]), "latitude" => $data["lat"], "longitude" => $data["lng"], "is_featured" => true]);
        }
    }
}