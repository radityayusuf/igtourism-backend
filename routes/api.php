<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\{HomepageController, MapController};

/*
|--------------------------------------------------------------------------
| API Routes — GI Tourism Indonesia
|--------------------------------------------------------------------------
*/

// Public routes
Route::prefix('v1')->group(function () {
    // Homepage aggregated data
    Route::get('/homepage', [HomepageController::class, 'index']);

    // Interactive Map
    Route::prefix('map')->group(function () {
        Route::get('/data', [MapController::class, 'data']);
        Route::get('/geojson', [MapController::class, 'geojson']);
        Route::get('/province/{slug}', [MapController::class, 'province']);
    });

    // Regions & Geography
    Route::get('/regions', fn() => \App\Models\Region::orderBy('sort_order')->get());
    Route::get('/provinces', fn() => \App\Models\Province::with('region:id,name,slug')->get());
    Route::get('/provinces/{slug}', fn($slug) => \App\Models\Province::where('slug', $slug)->with(['region', 'destinations'])->firstOrFail());

    // Destinations
    Route::get('/destinations', fn() => \App\Models\Destination::with('province:id,name,slug')->when(request('featured'), fn($q) => $q->where('is_featured', true))->paginate(12));
    Route::get('/destinations/{slug}', fn($slug) => \App\Models\Destination::where('slug', $slug)->with(['province.region', 'giProducts.category', 'experiences.category', 'producers', 'restaurants', 'accommodations'])->firstOrFail());

    // GI Products
    Route::get('/product-categories', fn() => \App\Models\ProductCategory::orderBy('sort_order')->withCount('products')->get());
    Route::get('/products', fn() => \App\Models\GiProduct::with(['category:id,name,name_id,slug,icon', 'destination:id,name,slug,province_id', 'destination.province:id,name,slug'])->when(request('category'), fn($q, $v) => $q->whereHas('category', fn($sq) => $sq->where('slug', $v)))->when(request('featured'), fn($q) => $q->where('is_featured', true))->paginate(12));
    Route::get('/products/{slug}', fn($slug) => \App\Models\GiProduct::where('slug', $slug)->with(['category', 'destination.province.region', 'producers', 'supplyChainSteps', 'marketListings' => fn($q) => $q->where('is_active', true)])->firstOrFail());

    // Experiences
    Route::get('/experience-categories', fn() => \App\Models\ExperienceCategory::orderBy('sort_order')->withCount('experiences')->get());
    Route::get('/experiences', fn() => \App\Models\Experience::with(['category:id,name,name_id,icon', 'destination:id,name,slug'])->when(request('category'), fn($q, $v) => $q->whereHas('category', fn($sq) => $sq->where('slug', $v)))->when(request('featured'), fn($q) => $q->where('is_featured', true))->paginate(12));
    Route::get('/experiences/{slug}', fn($slug) => \App\Models\Experience::where('slug', $slug)->with(['category', 'destination.province'])->firstOrFail());

    // Journeys
    Route::get('/journeys', fn() => \App\Models\Journey::with('stops.destination:id,name,slug')->when(request('audience'), fn($q, $v) => $q->where('target_audience', $v))->when(request('featured'), fn($q) => $q->where('is_featured', true))->paginate(12));
    Route::get('/journeys/{slug}', fn($slug) => \App\Models\Journey::where('slug', $slug)->with(['stops.destination.province', 'stops.destination.giProducts.category'])->firstOrFail());

    // People (Producers)
    Route::get('/people', fn() => \App\Models\Producer::with(['destination:id,name,slug,province_id', 'destination.province:id,name,slug', 'products:id,name,slug,image'])->when(request('featured'), fn($q) => $q->where('is_featured', true))->paginate(12));
    Route::get('/people/{slug}', fn($slug) => \App\Models\Producer::where('slug', $slug)->with(['destination.province', 'products.category'])->firstOrFail());

    // Articles / Stories
    Route::get('/article-categories', fn() => \App\Models\ArticleCategory::orderBy('sort_order')->withCount('articles')->get());
    Route::get('/articles', fn() => \App\Models\Article::whereNotNull('published_at')->with('category:id,name,name_id,slug')->when(request('category'), fn($q, $v) => $q->whereHas('category', fn($sq) => $sq->where('slug', $v)))->orderByDesc('published_at')->paginate(12));
    Route::get('/articles/{slug}', fn($slug) => \App\Models\Article::where('slug', $slug)->with('category')->firstOrFail());

    // Events
    Route::get('/events', fn() => \App\Models\Event::with('province:id,name,slug')->when(request('upcoming'), fn($q) => $q->where('start_date', '>=', now()))->when(request('type'), fn($q, $v) => $q->where('event_type', $v))->orderBy('start_date')->paginate(12));
    Route::get('/events/{slug}', fn($slug) => \App\Models\Event::where('slug', $slug)->with(['province', 'productCategory'])->firstOrFail());

    // Market
    Route::get('/market/listings', fn() => \App\Models\MarketListing::where('is_active', true)->with(['product:id,name,slug,image,category_id,destination_id', 'product.category:id,name,slug', 'product.destination:id,name,slug'])->paginate(12));
    Route::get('/market/listings/{id}', fn($id) => \App\Models\MarketListing::where('is_active', true)->with(['product.category', 'product.destination.province', 'product.supplyChainSteps'])->findOrFail($id));

    // Partners
    Route::get('/partners', fn() => \App\Models\Partner::orderBy('sort_order')->get());

    // Islands
    Route::get('/islands', fn() => \App\Models\Island::with('provinces:id,name,slug,island_id')->get());

    // Restaurants
    Route::get('/restaurants', fn() => \App\Models\Restaurant::with('destination:id,name,slug')->get());

    // Chefs
    Route::get('/chefs', fn() => \App\Models\Chef::with('restaurant:id,name,slug')->get());

    // Recipes
    Route::get('/recipes', fn() => \App\Models\Recipe::all());

    // Gastronomy Routes
    Route::get('/gastronomy-routes', fn() => \Illuminate\Support\Facades\DB::table('gastronomy_routes')->get());

    // Food Pairings
    Route::get('/food-pairings', fn() => \Illuminate\Support\Facades\DB::table('food_pairings')->get());

    // Accommodations
    Route::get('/accommodations', fn() => \App\Models\Accommodation::with('destination:id,name,slug')->get());

    // Search
    Route::get('/search', function () {
        $q = request('q', '');
        if (strlen($q) < 2) return response()->json(['results' => []]);
        return response()->json([
            'destinations' => \App\Models\Destination::where('name', 'like', "%{$q}%")->limit(5)->get(['id', 'name', 'slug', 'image']),
            'products' => \App\Models\GiProduct::where('name', 'like', "%{$q}%")->limit(5)->get(['id', 'name', 'slug', 'image']),
            'experiences' => \App\Models\Experience::where('name', 'like', "%{$q}%")->limit(5)->get(['id', 'name', 'slug', 'image']),
        ]);
    });
});

// Authenticated routes
Route::prefix('v1')->middleware('auth:sanctum')->group(function () {
    Route::get('/user', fn(Request $request) => $request->user());

    // GI Passport
    Route::get('/passport/stamps', fn(Request $request) => $request->user()->passportStamps ?? collect());
    Route::get('/passport/profile', fn(Request $request) => $request->user()->only(['id', 'name', 'email', 'avatar', 'passport_tier', 'total_stamps']));
});
