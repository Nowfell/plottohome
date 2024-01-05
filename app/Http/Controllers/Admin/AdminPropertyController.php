<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\PropertyUploadedImage;
use App\Models\PropertyImage;
use App\Models\Property;
use Datatables;
use Exception;
use Illuminate\Database\QueryException;

class AdminPropertyController extends AdminBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->properties = Property::all();
        return view('admin.properties.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->categories = Config::get('constants');
        $this->locations = Property::distinct()->get('location');
        return view('admin.properties.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        try {
            $request->validate([
                'property_name' => 'required|unique:properties,name|max:255',
                'property_price' => 'required|numeric',
                'property_location' => 'required',
                'property_category' => 'required',
                'property_summary' => 'required|min:3|max:150',
                'property_description' => 'required|min:3',
                'property_images.*' => 'required|mimes:jpg,bmp,png,jpeg'
            ]);
            
            $filenametostore = '';
    
            $property_images = PropertyImage::where('temp','0');
            $property_images_first = clone $property_images;
            $property_images_first = $property_images_first->first();
    
            $property = new Property();
            $property->featured = isset($request->property_featured) ? true : false;
            $property->name = $request->property_name;
            $property->price = $request->property_price;
            $property->location = $request->property_location;
            $property->categories = $request->property_category;
            $property->summary = $request->property_summary;
            $property->description = $request->property_description;
            $property->save();
    
            if($request->hasFile('property_images')) {
                foreach ($request->property_images as $property_image) {
                    $image = $property_image;
                    //get filename with extension
                    $filenamewithextension = $image->getClientOriginalName();
    
                    //get filename without extension
                    $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
    
                    //get file extension
                    $extension = $image->getClientOriginalExtension();
    
                    //filename to store
                    $filenametostore = $filename.'_'.time().'.'.$extension;
    
                    //Upload File
                    // $image->storeAs('public/Product Images', $filenametostore);
                    $image->move(public_path().'/Property Images/', $filenametostore);
    
                    $property_uploaded_image = new PropertyUploadedImage();
                    $property_uploaded_image->name = $filenametostore;
                    $property_uploaded_image->property_id = $property->id;
                    $property_uploaded_image->save();
                }
            }
    
            $property_images = $property_images->get();
    
            if($property_images_first){
    
                foreach ($property_images as $property_image) {
                    $property_image->property_id = $property->id;
                    $property_image->temp = '1';
                    $property_image->save();
                }
            }
    
            return redirect()->route('admin.properties.index')->with('success','Added Property Successfully');
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $property = Property::with('property_uploaded_images')->findOrFail($id);
        $categories = Config::get('constants');

        return response()->json(['property' => $property, 'category' => $categories[$property->categories]]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->categories = Config::get('constants');
        $this->property = Property::findOrFail($id);
        $this->locations = Property::distinct()->get('location');
        return view('admin.properties.edit',$this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'property_name' => 'required|unique:properties,name,'.$id.'|max:255',
            'property_price' => 'required|numeric',
            'property_location' => 'required',
            'property_category' => 'required',
            'property_summary' => 'required|min:3',
            //'property_images' => 'required|mimes:jpg,bmp,png,jpeg'
            'property_images.*' => 'required|mimes:jpg,bmp,png,jpeg'
        ]);
        
        $property_images = PropertyImage::where('temp','0');
        $property_images_first = clone $property_images;
        $property_images_first = $property_images_first->first();

        $property = Property::findOrFail($id);
        $property->featured = isset($request->property_featured) ? true : false;
        $property->name = $request->property_name;
        $property->price = $request->property_price;
        $property->location = $request->property_location;
        $property->categories = $request->property_category;
        $property->summary = $request->property_summary;
        $property->description = $request->property_description;
        $property->save();

        $property_uploaded_image_ids = $property->property_uploaded_images->map(function($image){
            return $image->id;
        })->toArray();


if ($request->old_property_images) {
        $remaining_property_image_ids_arr = array_diff($property_uploaded_image_ids, $request->old_property_images);
}
        if(isset($remaining_property_image_ids_arr) && !empty($remaining_property_image_ids_arr)){
            $removed_property_images = PropertyUploadedImage::whereIn('id', $remaining_property_image_ids_arr)->get();

            foreach($removed_property_images as $property_image) {
                $image_path = public_path("Property Images\\".$property_image->name);
                if(File::exists($image_path)){
                    File::delete($image_path);
                    PropertyUploadedImage::where('name', $property_image->name)->delete();
                }
            }
        }

        if($request->hasFile('property_images')) {
                foreach($request->property_images as $property_image) {

                $image = $property_image;
                //get filename with extension
                $filenamewithextension = $image->getClientOriginalName();

                //get filename without extension
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

                //get file extension
                $extension = $image->getClientOriginalExtension();

                //filename to store
                $filenametostore = $filename.'_'.time().'.'.$extension;

                //Upload File
                // $image->storeAs('public/Product Images', $filenametostore);
                $image->move(public_path().'/Property Images/', $filenametostore);

                $property_uploaded_image = new PropertyUploadedImage();
                $property_uploaded_image->name = $filenametostore;
                $property_uploaded_image->property_id = $property->id;
                $property_uploaded_image->save();
            }
        }

        $property_images = $property_images->get();

        if($property_images_first){

            foreach ($property_images as $property_image) {
                $property_image->property_id = $property->id;
                $property_image->temp = '1';
                $property_image->save();
            }
        }

        return redirect()->route('admin.properties.index')->with('success','Updated Property Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try
        {
            $property = Property::findOrFail($id);
            $property_images = $property->property_image;

            foreach ($property_images as $property_image) {
                $image_description_path = public_path("Property Images/".$property_image->image_names);
                if(File::exists($image_description_path))
                    File::delete($image_description_path);


                $property_image->delete();
            }

            $image_path = public_path("Property Images/".$property->image);

            if(File::exists($image_path))
                File::delete($image_path);

            $property->delete();
        }
        catch(QueryException $ex)
        {
            if ($ex->getCode()=='23000'){
                return response()->json([
                    'status' => 'error'
                ]);
            }
        }
    }


    public function data(Request $request)
    {

        $properties = Property::select('id','name');

        $properties = $properties->get();

    return Datatables::of($properties)
    ->addColumn('action', function ($row) {

        $action = '<ul role="menu" style="width: 70%;" class="table-action-icons d-flex justify-content-between">
          <li><a href="'. route('admin.properties.edit', [$row->id]) .'" class="text-primary" data-toggle="tooltip" title="edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></li>
          <li  data-toggle="modal" data-target="#viewProperty"><a href="javascript:void(0);" class="view-property text-success" data-property-id="'. $row->id .'" data-toggle="tooltip" title="view"><i class="fa fa-eye" aria-hidden="true"></i></a></li>
          <li><a href="javascript:;"  data-property-id="' . $row->id . '"  class="sa-params text-danger"  data-toggle="tooltip" title="delete"><i class="fa fa-trash" aria-hidden="true"></a></li>';

        $action .= '</ul>';

        return $action;
    })
    ->addIndexColumn()
    ->rawColumns(['action'])
    ->make(true);
    }
}
