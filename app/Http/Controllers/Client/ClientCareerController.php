<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Career;

class ClientCareerController extends ClientBaseController
{
    public function careers()
    {
        $country_json_file = file_get_contents(asset('include/countries.json'));

        $this->pageTitle = '';
        $this->page = 'Careers';
        $this->careers = Career::all();
        $this->countries = json_decode($country_json_file, true);

        return view('client.careers', $this->data);
    }

    public function career($id)
    {
        $country_json_file = file_get_contents(asset('include/countries.json'));

        $this->career = Career::findOrFail($id);
        $this->careers = Career::all();
        $this->countries = json_decode($country_json_file, true);

        $this->pageTitle = '';
        $this->page = $this->career->career_name;

        return view('client.career', $this->data);
    }
}
