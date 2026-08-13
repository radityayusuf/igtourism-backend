<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\ArticleCategory;
use App\Models\Article;
use Illuminate\Support\Str;

class ArticleSeeder extends Seeder {
    public function run(): void {
        $categoriesData = [ ["name" => "Rempah Nusantara"], ["name" => "Travel Guide"], ["name" => "Festival Budaya"] ];
        $categories = [];
        foreach ($categoriesData as $data) {
            $categories[] = ArticleCategory::create(["name" => $data["name"], "slug" => Str::slug($data["name"])]);
        }
        $articlesData = [
            ["title" => "Indonesian Spices", "category_id" => $categories[0]->id, "image" => "seeders/articles/spices.webp"],
            ["title" => "Lombok Travel Guide", "category_id" => $categories[1]->id, "image" => "seeders/articles/lombok.webp"],
            ["title" => "Cultural Festival", "category_id" => $categories[2]->id, "image" => "seeders/articles/festival.webp"],
            ["title" => "Coffee Harvesting", "category_id" => $categories[0]->id, "image" => "seeders/articles/coffee_harvest.webp"],
            ["title" => "Food Festival", "category_id" => $categories[2]->id, "image" => "seeders/articles/food_festival.webp"],
        ];
        foreach ($articlesData as $data) {
            Article::create(["title" => $data["title"], "slug" => Str::slug($data["title"]), "category_id" => $data["category_id"], "author" => "Admin", "excerpt" => "Excerpt", "body" => "Content", "image" => $data["image"], "published_at" => now()]);
        }
    }
}