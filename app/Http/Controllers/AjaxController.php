<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function locationSearch(Request $request)
    {
    	$locations = [];

        if($request->has('q')){
            $search = $request->q;
            $locations =Property::select("id", "location")
            		->where('location', 'LIKE', "%$search%")
                    ->distinct()
            		->get();
        }
        return response()->json($locations);
    }
}
