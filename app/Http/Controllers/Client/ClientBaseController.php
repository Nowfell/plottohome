<?php

namespace App\Http\Controllers\Client;

use App\Models\Property;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Config;

class ClientBaseController extends Controller
{
    /**
     * @var array
     */
    public $data = [];

    /**
     * @param $name
     * @param $value
     */
    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    /**
     * @param $name
     * @return mixed
     */
    public function __get($name)
    {
        return $this->data[$name];
    }

    /**
     * @param $name
     * @return bool
     */
    public function __isset($name)
    {
        return isset($this->data[ $name ]);
    }

    public function __construct() {

        $this->categories = Config::get('constants');
        $this->locations = Property::distinct()->get('location');
        $this->footer_properties = Property::with('property_uploaded_images')->skip(0)->take(6)->get();
        $this->route_name = str_replace('client.','',\Request::route()->getName());

        View::share ('data', $this->data);
    }

    public function contact(){

        return view('client.contact', $this->data);
    }

    public function about(){

        return view('client.about', $this->data);
    }

    public function gallery(){

        $this->properties = Property::with('property_uploaded_images')->get();

        return view('client.gallery', $this->data);
    }

}
