<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;

class ClientServiceController extends ClientBaseController
{
    public function services()
    {
        $this->pageTitle = '';
        $this->page = 'All Services';
        $this->services = Service::all();

        return view('client.services', $this->data);
    }

    public function service($id)
    {
        $this->service = Service::findOrFail($id);
        $this->services = Service::all();

        $this->pageTitle = '';
        $this->page = $this->service->service_name;

        return view('client.service', $this->data);
    }
}
