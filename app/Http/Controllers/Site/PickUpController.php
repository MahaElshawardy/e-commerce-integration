<?php

namespace App\Http\Controllers\Site;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Services\ShipmentService;
use App\Http\Controllers\Controller;

class PickUpController extends Controller
{
    protected $shipmentService;

    public function __construct(ShipmentService $shipmentService)
    {
        $this->shipmentService = $shipmentService;
    }

    public function index()
    {
        return view('site.pickUp.maps');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $location = $this->get_name_location($data);
        $data['name'] = $location['name'];
        $data['address'] = $location['display_name'];
        $data['city'] = $location['address']['state'];
        $data['country'] = $location['address']['country_code'];
        $this->shipmentService->createPickUpLocation($data);

        return redirect()->route('pickup.index');
    }

    public function get_name_location($data)
    {
        $client = new Client();
        $response = $client->get("https://nominatim.openstreetmap.org/reverse?format=json&lat={$data['latitude']}&lon={$data['longitude']}&zoom=18&addressdetails=1");
        return json_decode($response->getBody(), true);
    }
}
