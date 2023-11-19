<?php

// app/Services/ShipmentService.php

namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;

class ShipmentService
{
    protected $client;
    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => env('REAL_URL'),
            'headers' => [
                'Authorization' => 'Bearer ' . Session::get('access_token'),
                'Accept' => 'application/json',
            ],
        ]);
    }

    public function refreshToken()
    {
        $data = [
            "refresh_token" => env('SHIPMENT_API_KEY')
        ];
        $response = $this->client->post('/rest/v2/refreshToken', [
            'json' => $data,
        ]);
        Session::put('access_token', json_decode($response->getBody(), true)['access_token']);
    }

    public function createPickUpLocation($data)
    {
        $data = [
            "type" => "warehouse",
            "code" => "code-" . rand(10, 99),
            "name" => $data['name'],
            "mobile" => "503245843",
            "address" => $data['address'],
            "contactName" => "Maha Elshawardy",
            "contactEmail" => "melshawardy@gmail.com",
            "lat" => $data['latitude'],
            "lon" => $data['longitude'],
            "city" => $data['city'],
            "country" => $data['country'],
            "brandName" => "test"
        ];
        $response = $this->client->post('/rest/v2/createPickupLocation', [
            'json' => $data,
        ]);

        return json_decode($response->getBody(), true);
    }

    public function createShipment($data)
    {
        $response = $this->client->post('/rest/v2/createShipment', [
            'json' => $data,
        ]);

        return json_decode($response->getBody(), true);
    }

    public function createProduct($data)
    {
        $data = [
            "productName" => $data['name'],
            "sku" => rand(1000, 9999),
            "price" => $data['price'],
            "taxAmount" => 10,
            "barcode" => rand(10, 99),
            "secondBarcode" => rand(1000, 9999),
            "description" => $data['description'],
            "customAttributes" => [
                "attributeName" => 12,
                "attributeValue" => 'test product'
            ]
        ];
        $response = $this->client->post('/rest/v2/createProduct', [
            'json' => $data,
        ]);

        return json_decode($response->getBody(), true);
    }
}
