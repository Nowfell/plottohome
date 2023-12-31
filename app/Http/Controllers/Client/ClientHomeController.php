<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;

class ClientHomeController extends ClientBaseController
{
    public function index()
    {
        session(['type' => 'type']);
        session(['location' => 'location']);
        session(['searchKeyword' => '']);

        $this->latest_properties = Property::with('property_uploaded_images')->orderBy('created_at', 'DESC')->take(6)->get();
        $this->featured_properties = Property::with('property_uploaded_images')->where('featured', true)->orderBy('created_at', 'DESC')->take(6)->get();
        return view('client.home', $this->data);
    }

}
