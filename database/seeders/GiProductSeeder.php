<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\ProductCategory;
use App\Models\Producer;
use App\Models\GiProduct;
use App\Models\SupplyChainStep;
use App\Models\Destination;
use Illuminate\Support\Str;

class GiProductSeeder extends Seeder {
    public function run(): void {
        $destinations = Destination::all();
        
        $categoriesData = [
            ["name" => "Kopi", "icon" => "lucide-coffee"],
            ["name" => "Kain Tradisional", "icon" => "lucide-shirt"],
            ["name" => "Kerajinan Kayu", "icon" => "lucide-hammer"],
            ["name" => "Rempah-rempah", "icon" => "lucide-leaf"],
            ["name" => "Hasil Pertanian", "icon" => "lucide-wheat"],
        ];
        $categories = [];
        foreach ($categoriesData as $data) {
            $categories[] = ProductCategory::create(["name" => $data["name"], "slug" => Str::slug($data["name"]), "icon" => $data["icon"], "description" => "Kategori ".$data["name"]]);
        }
        
        $producersData = [
            ["name" => "Petani Kopi Gayo", "photo" => "seeders/producers/coffee_farmer.webp", "role" => "Petani"],
            ["name" => "Pengrajin Batik", "photo" => "seeders/producers/batik_maker.webp", "role" => "Pengrajin"],
            ["name" => "Pengukir Kayu", "photo" => "seeders/producers/woodcarver.webp", "role" => "Pengukir"],
            ["name" => "Penenun Tradisional", "photo" => "seeders/producers/weaver.webp", "role" => "Penenun"],
            ["name" => "Pemetik Teh", "photo" => "seeders/producers/tea_picker.webp", "role" => "Pemetik"],
        ];
        $producers = [];
        foreach ($producersData as $i => $data) {
            $producers[] = Producer::create(["destination_id" => $destinations[$i % count($destinations)]->id, "name" => $data["name"], "slug" => Str::slug($data["name"]), "role" => $data["role"], "story" => "Cerita tentang " . $data["name"], "photo" => $data["photo"], "is_featured" => true]);
        }
        
        $productsData = [
            ["name" => "Kopi Arabika Gayo", "category_id" => $categories[0]->id, "image" => "seeders/products/gayo_coffee.webp"],
            ["name" => "Batik Pekalongan", "category_id" => $categories[1]->id, "image" => "seeders/products/batik.webp"],
            ["name" => "Ukir Kayu Jepara", "category_id" => $categories[2]->id, "image" => "seeders/products/jepara.webp"],
            ["name" => "Lada Putih Muntok", "category_id" => $categories[3]->id, "image" => "seeders/products/muntok.webp"],
            ["name" => "Madu Hutan Sumbawa", "category_id" => $categories[4]->id, "image" => "seeders/products/sumbawa_honey.webp"],
        ];
        foreach ($productsData as $i => $data) {
            $p = GiProduct::create(["destination_id" => $destinations[$i % count($destinations)]->id, "name" => $data["name"], "slug" => Str::slug($data["name"]), "category_id" => $data["category_id"], "description" => "Produk Indikasi Geografis: " . $data["name"], "origin_story" => "Sejarah panjang dari " . $data["name"], "image" => $data["image"], "gallery" => json_encode([$data["image"]]), "is_featured" => true]);
            
            $steps = [["name"=>"Pemanenan","icon"=>"lucide-scissors","level"=>"farmer_group"],["name"=>"Pencucian","icon"=>"lucide-droplets","level"=>"processing"],["name"=>"Penjemuran","icon"=>"lucide-sun","level"=>"processing"],["name"=>"Pengolahan","icon"=>"lucide-flame","level"=>"processing"],["name"=>"Pengemasan","icon"=>"lucide-package","level"=>"product"]];
            $order = 1;
            foreach ($steps as $step) {
                SupplyChainStep::create(["gi_product_id" => $p->id, "step_order" => $order, "level" => $step["level"], "label" => $step["name"], "description" => "Proses ".$step["name"], "icon" => $step["icon"]]);
                $order++;
            }
        }
    }
}