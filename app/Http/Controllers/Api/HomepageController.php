<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\{Region, Province, Destination, GiProduct, Experience, Journey, Article, Event, Partner, ProductCategory, ExperienceCategory};
use Illuminate\Http\JsonResponse;

class HomepageController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json([
            'hero' => [
                'title' => 'Travel the Origin. Taste the Identity.',
                'title_id' => 'Jelajahi Asal. Rasakan Identitas.',
                'subtitle' => 'Discover Indonesia\'s Geographical Indication destinations, products, and authentic experiences.',
                'subtitle_id' => 'Temukan destinasi Indikasi Geografis Indonesia, produk, dan pengalaman autentik.',
            ],
            'stats' => [
                'destinations' => Destination::count(),
                'products' => GiProduct::count(),
                'experiences' => Experience::count(),
                'provinces' => Province::where('gi_product_count', '>', 0)->count(),
            ],
            'featured_destinations' => Destination::where('is_featured', true)
                ->with('province:id,name,slug')
                ->limit(8)
                ->get(['id', 'name', 'name_id', 'slug', 'tagline', 'tagline_id', 'image', 'province_id']),
            'featured_products' => GiProduct::where('is_featured', true)
                ->with(['category:id,name,name_id,slug,icon', 'destination:id,name,slug,province_id', 'destination.province:id,name,slug'])
                ->limit(8)
                ->get(['id', 'name', 'name_id', 'slug', 'image', 'category_id', 'destination_id']),
            'product_categories' => ProductCategory::orderBy('sort_order')->get(['id', 'name', 'name_id', 'slug', 'icon', 'image']),
            'featured_experiences' => Experience::where('is_featured', true)
                ->with(['category:id,name,name_id,icon', 'destination:id,name,slug'])
                ->limit(6)
                ->get(['id', 'name', 'name_id', 'slug', 'image', 'duration', 'price', 'currency', 'category_id', 'destination_id']),
            'latest_articles' => Article::whereNotNull('published_at')
                ->with('category:id,name,name_id,slug')
                ->orderByDesc('published_at')
                ->limit(4)
                ->get(['id', 'title', 'title_id', 'slug', 'excerpt', 'excerpt_id', 'image', 'author', 'published_at', 'category_id']),
            'upcoming_events' => Event::where('start_date', '>=', now())
                ->with('province:id,name,slug')
                ->orderBy('start_date')
                ->limit(4)
                ->get(['id', 'title', 'title_id', 'slug', 'event_type', 'start_date', 'end_date', 'location', 'image', 'province_id']),
            'partners' => Partner::where('is_featured', true)
                ->orderBy('sort_order')
                ->get(['id', 'name', 'logo', 'website']),
        ]);
    }
}
