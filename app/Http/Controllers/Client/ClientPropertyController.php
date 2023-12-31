<?php

namespace App\Http\Controllers\Client;

use Illuminate\Support\Facades\Config;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;

class ClientPropertyController extends ClientBaseController
{
    public function property($id){
        $this->property = Property::with('property_uploaded_images')->findOrFail($id);

        $this->shareComponent = \Share::page(
            route('client.property', $id),
            ucwords($this->property->name),
        )
        ->facebook()
        ->twitter()
        ->linkedin()
        ->telegram()
        ->whatsapp()
        ->reddit();

        return view('client.property', $this->data);
    }

    public function properties(Request $request, $type, $location, $state, $keyword=null)
    {
        session(['type' => $type]);
        session(['location' => $location]);
        session(['searchKeyword' => $keyword]);

        $properties = Property::with('property_uploaded_images');

        if($type != '' && $type != 'type' && session('type') != 'type')
            $properties = $properties->where('categories', array_search($type, Config::get('constants')));

        if($location != '' && $location != 'location' && session('location') != 'location')
            $properties = $properties->where('location', $location);

        if($keyword != null && session('searchKeyword') != '')
            $properties = $properties->where('name', 'LIKE', "%$keyword%");

        if($state == 'featured'){
            $this->featured_properties = $properties->where('featured', true)->paginate(9);
            $this->properties = new \stdClass();
            $this->featured = true;
        }elseif($state == 'all'){
            $this->properties = $properties->paginate(9);
            $this->featured_properties = new \stdClass();
            $this->featured = false;
        }

        return view('client.properties', $this->data);
    }
}
