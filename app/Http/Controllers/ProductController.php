<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use function Fuse\Helpers\get;

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
        try {
            $response = Http::withToken($this->apiToken)->get($this->apiUrl);
            $navbarList = Http::get('http://0.0.0.0:8055/items/Navbar_List');

            if ($navbarList->successful()) {
                $navbarList = array_slice($navbarList->json('data')[0],2);
            } else {
                $navbarList = [];
            }

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

                return inertia('App', [
                    'products' => $products,
                    'navbarList' => $navbarList
                ]);

            } else {
                return inertia('ErrorPage', ['message' => 'Failed to fetch products']);
            }
        } catch (Exception $e) {
            return inertia('ErrorPage', ['message' => $e->getMessage()]);
        }
    }

    public function show($id)
    {
        try {
            $response = Http::withToken($this->apiToken)->get($this->apiUrl . '/' . $id);

            if ($response->successful()) {
                $product = $response->json('data');

                return inertia('ProductDetail', ['product' => $product]);
            } else {
                return inertia('ErrorPage', ['message' => 'Failed to fetch product']);
            }
        } catch (Exception $e) {
            return inertia('ErrorPage', ['message' => $e->getMessage()]);
        }
    }
}
