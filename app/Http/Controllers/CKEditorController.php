<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PropertyImage;

class CKEditorController extends Controller
{
    public function file_uploader($project, Request $request)
    {
        // dd($request->input('CKEditorFuncNum'));
        $folderName = 'Upload';
        if($project == 'property')
            $folderName = 'Property Images';
        if($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName.'_'.time().'.'.$extension;

            $request->file('upload')->move(public_path($folderName), $fileName);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum') ? $request->input('CKEditorFuncNum') : 0;

        if($CKEditorFuncNum > 0){

            $url = asset($folderName.'/'.$fileName);
            $msg = 'Image successfully uploaded';
            $renderHtml = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            // Render HTML output
            @header('Content-type: text/html; charset=utf-8');
            echo $renderHtml;

        } else {

                $url = asset($folderName.'/'.$fileName);
                $msg = 'Image successfully uploaded';
                $renderHtml = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
                return response()->json([
                    'uploaded' => '1',
                    'fileName' => $fileName,
                    'url' => $url
                ]);
            }

            if($project == 'property'){
                $property_image = new PropertyImage();
                $property_image->image_names = $fileName;
                $property_image->save();
            }
        }
    }
}
