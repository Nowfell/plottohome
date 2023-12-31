<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\CareerImage;
use App\Models\Career;
use Datatables;

class AdminCareerController extends AdminBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->careers = Career::all();
        return view('admin.careers.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.careers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $career_images = CareerImage::where('temp','0');
        $career_images_first = clone $career_images;
        $career_images_first = $career_images_first->first();

        if($request->hasFile('career_image')) {
            $career_image = $request->file('career_image');
            //get filename with extension
            $filenamewithextension = $career_image->getClientOriginalName();

            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

            //get file extension
            $extension = $career_image->getClientOriginalExtension();

            //filename to store
            $filenametostore = $filename.'_'.time().'.'.$extension;

            //Upload File
            // $career_image->storeAs('public/Career Images', $filenametostore);
            $career_image->move(public_path().'/Career Images/', $filenametostore);
        }

        $career = new Career();
        $career->career_name = $request->career_name;
        $career->career_summary = $request->career_summary;
        $career->career_description = $request->career_description;
        $career->image_name = $filenametostore;
        $career->save();

        $career_images = $career_images->get();

        if($career_images_first){

            foreach ($career_images as $career_description_image) {
                $career_description_image->career_id = $career->id;
                $career_description_image->temp = '1';
                $career_description_image->save();
            }
        }

        return redirect()->route('admin.careers.index')->with('success','Added Career Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $career = Career::findOrFail($id);

       return response()->json(['career' => $career]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->career = Career::findOrFail($id);
        return view('admin.careers.edit',$this->data);
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
        $career_images = CareerImage::where('temp','0');
        $career_images_first = clone $career_images;
        $career_images_first = $career_images_first->first();

        $career = Career::findOrFail($id);

        $image_path = public_path("Career Images/".$career->image_name);

        if($request->hasFile('career_image')) {

            if(File::exists($image_path))
                File::delete($image_path);

            $career_image = $request->file('career_image');
            //get filename with extension
            $filenamewithextension = $career_image->getClientOriginalName();

            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

            //get file extension
            $extension = $career_image->getClientOriginalExtension();

            //filename to store
            $filenametostore = $filename.'_'.time().'.'.$extension;

            //Upload File
            // $career_image->storeAs('public/Career Images', $filenametostore);
            $career_image->move(public_path().'/Career Images/', $filenametostore);

            $career->image_name = $filenametostore;
        }

        $career->career_name = $request->career_name;
        $career->career_summary = $request->career_summary;
        $career->career_description = $request->career_description;
        $career->save();

        $career_images = $career_images->get();

        if($career_images_first){

            foreach ($career_images as $career_description_image) {
                $career_description_image->career_id = $career->id;
                $career_description_image->temp = '1';
                $career_description_image->save();
            }
        }

        return redirect()->route('admin.careers.index')->with('success','Updated Career Successfully');
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
            $career = Career::findOrFail($id);
            $career_images = $career->career_image;

            foreach ($career_images as $career_image) {
                $image_description_path = public_path("Career Images/".$career_image->image_names);
                if(File::exists($image_description_path)){

                    File::delete($image_description_path);
                    $career_image->delete();

                }
            }


            $image_path = public_path("Career Images/".$career->image_name);

            if(File::exists($image_path)){
                File::delete($image_path);
                $career->delete();
            }
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

        $careers = Career::select('id','career_name');

        $careers = $careers->get();

    return Datatables::of($careers)
    ->addColumn('action', function ($row) {

        $action = '<ul role="menu" style="width: 70%;" class="table-action-icons d-flex justify-content-between">
          <li><a href="'. route('admin.careers.edit', [$row->id]) .'" class="text-primary" data-toggle="tooltip" title="edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></li>
          <li  data-toggle="modal" data-target="#viewCareer"><a href="javascript:void(0);" class="view-career text-success" data-career-id="'. $row->id .'" data-toggle="tooltip" title="view"><i class="fa fa-eye" aria-hidden="true"></i></a></li>
          <li><a href="javascript:;"  data-career-id="' . $row->id . '"  class="sa-params text-danger"  data-toggle="tooltip" title="delete"><i class="fa fa-trash" aria-hidden="true"></a></li>';

        $action .= '</ul>';

        return $action;
    })
    ->addIndexColumn()
    ->rawColumns(['action'])
    ->make(true);
    }
}
