<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public string $apiUrl = "http://0.0.0.0:8055/items/Products";
    private string $apiToken;

    public function __construct()
    {
        $this->apiToken = env('DIRECTUS_TOKEN');

        if (!$this->apiToken) {
            throw new Exception('API token is missing');
        }
    }

    public function index()
    {
        $response = Http::withToken($this->apiToken)->get($this->apiUrl);

        if ($response->successful()) {
            $products = $response->json('data');
            foreach ($products as &$product) {
                $imageId = $product['images'];

                $imageResponse = Http::withToken($this->apiToken)
                    ->get("http://0.0.0.0:8055/assets/{$imageId}");

                if ($imageResponse->successful()) {
                    $imageData = $imageResponse->body();

                    $imagePath = "images/products/{$imageId}.jpg";
                    Storage::disk('public')->put($imagePath, $imageData);

                    $product['image_url'] = asset("storage/{$imagePath}");
                }
            }

            return inertia('App', ['products' => $products]);
        }

        return response()->json(['error' => 'Failed to fetch products'], $response->status());
    }

    public function show($id)
    {
        $response = Http::withToken($this->apiToken)->get($this->apiUrl . '/' . $id);

        if ($response->successful()) {
            $product = $response->json('data');
            dd($product);
        }

        return response()->json(['error' => 'Failed to fetch product'], $response->status());
    }
}
