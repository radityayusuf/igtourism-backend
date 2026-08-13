<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Province;
use Illuminate\Http\JsonResponse;

class MapController extends Controller
{
    /**
     * Get all provinces with GI summary data for the interactive map
     */
    public function data(): JsonResponse
    {
        $provinces = Province::select([
            'id', 'name', 'name_id', 'slug', 'latitude', 'longitude',
            'gi_destination_count', 'gi_product_count', 'experience_count',
        ])->get();

        return response()->json([
            'provinces' => $provinces,
        ]);
    }

    /**
     * Get detailed data for a specific province
     */
    public function province(string $slug): JsonResponse
    {
        $province = Province::where('slug', $slug)
            ->with([
                'destinations' => fn($q) => $q->select('id', 'province_id', 'name', 'name_id', 'slug', 'tagline', 'tagline_id', 'image', 'latitude', 'longitude')->limit(10),
                'destinations.giProducts' => fn($q) => $q->select('id', 'destination_id', 'name', 'name_id', 'slug', 'image', 'category_id')->with('category:id,name,icon'),
            ])
            ->firstOrFail();

        return response()->json($province);
    }

    /**
     * Get GeoJSON for all provinces (for map rendering)
     */
    public function geojson(): JsonResponse
    {
        $features = Province::whereNotNull('geo_json')
            ->get(['id', 'slug', 'name', 'geo_json', 'gi_product_count', 'gi_destination_count', 'experience_count'])
            ->map(function ($province) {
                $geoJson = $province->geo_json;
                return [
                    'type' => 'Feature',
                    'properties' => [
                        'id' => $province->id,
                        'slug' => $province->slug,
                        'name' => $province->name,
                        'gi_products' => $province->gi_product_count,
                        'gi_destinations' => $province->gi_destination_count,
                        'experiences' => $province->experience_count,
                    ],
                    'geometry' => $geoJson,
                ];
            });

        return response()->json([
            'type' => 'FeatureCollection',
            'features' => $features,
        ]);
    }
}
