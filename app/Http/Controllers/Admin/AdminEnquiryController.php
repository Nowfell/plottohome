<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Enquiry;
use Datatables;

class AdminEnquiryController extends AdminBaseController
{
    public function product_enquiry()
    {
        return view('admin.enquiry.product.enquiry', $this->data);
    }

    public function service_enquiry()
    {
        return view('admin.enquiry.service.enquiry', $this->data);
    }

    public function career_enquiry()
    {
        return view('admin.enquiry.career.enquiry', $this->data);
    }

    public function product_enquiry_store(Request $request)
    {
        $enquiry = new Enquiry();
        $enquiry->enquiry_name = $request->enquiry_name;
        $enquiry->enquiry_email = $request->enquiry_email;
        $enquiry->enquiry_mobile = $request->enquiry_phone;
        $enquiry->enquiry_message = $request->enquiry_message;
        $enquiry->enquiry_product_id = $request->enquiry_id;
        $enquiry->save();
    }

    public function service_enquiry_store(Request $request)
    {
        $enquiry = new Enquiry();
        $enquiry->enquiry_name = $request->enquiry_name;
        $enquiry->enquiry_email = $request->enquiry_email;
        $enquiry->enquiry_mobile = $request->enquiry_phone;
        $enquiry->enquiry_message = $request->enquiry_message;
        $enquiry->enquiry_service_id = $request->enquiry_id;
        $enquiry->save();
    }

    public function career_enquiry_store(Request $request)
    {
        $filenametostore = '';

        if($request->hasFile('enquiry_upload_cv')) {

            $pdf = $request->file('enquiry_upload_cv');

            //get filename with extension
            $filenamewithextension = $pdf->getClientOriginalName();

            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

            //get file extension
            $extension = $pdf->getClientOriginalExtension();

            //filename to store
            $filenametostore = $filename.'_'.time().'.'.$extension;

            //Upload File
            // $image->storeAs('public/Product Images', $filenametostore);
            $pdf->move(public_path().'/Career CV/', $filenametostore);

        }

        $enquiry = new Enquiry();
        $enquiry->enquiry_name = $request->enquiry_name;
        $enquiry->enquiry_email = $request->enquiry_email;
        $enquiry->enquiry_mobile = $request->enquiry_phone;
        $enquiry->nationality = $request->enquiry_nationality;
        $enquiry->experience = $request->enquiry_experience;
        $enquiry->education = $request->enquiry_education;
        $enquiry->cv = $filenametostore;
        $enquiry->enquiry_career_id = $request->enquiry_id;
        $enquiry->save();
    }

    public function enquiry_message($id)
    {
        $enquiry = Enquiry::findOrFail($id);

        return response()->json([
            'enquiry_message' => $enquiry->enquiry_message
        ]);
    }

    public function enquiry_destroy($id)
    {
        try
        {
            $enquiry = Enquiry::findOrFail($id);
            $enquiry->delete();
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

    public function enquiry_check($id, Request $request)
    {
        $state = $request->state;
        $value = '';
        if($state == 0)
            $value = 'No';
        else if($state == 1)
            $value = 'Yes';

        $enquiry = Enquiry::findOrFail($id);
        $enquiry->enquiry_contacted = $value;
        $enquiry->save();
    }

    
    public function career_enquiry_data(Request $request)
    {

        $enquiries = Enquiry::select('id','enquiry_name','enquiry_email','enquiry_mobile','nationality','experience','education','enquiry_contacted','cv','enquiry_career_id')->whereNotNull('enquiry_career_id');

        $enquiries = $enquiries->get();

        return Datatables::of($enquiries)
        ->editColumn('cv', function ($row) {
            $cv = '<ul role="menu" style="width: 70%;" class="table-action-icons d-flex justify-content-center">
            <li data-toggle="modal" data-target="#viewEnquiryPDF"><a href="'.asset('Career CV/'.$row->cv).'" target="_blank" class="view-enquiry-pdf text-success" data-enquiry-pdf-id="'. $row->id .'" data-toggle="tooltip" title="view"><i class="fa fa-share" aria-hidden="true"></i></a></li>';

            $cv .= '</ul>';

            return $cv;
        })
        ->editColumn('enquiry_contacted', function ($row) {
            $row->enquiry_contacted == 'Yes'? $check_string = 'checked': $check_string ='';

            $enquiry_contacted = '<input id="enquiry-contact-check" type="checkbox" data-enquiry-id="'. $row->id .'" netliva-switch data-active-text="Yes " data-passive-text="No" data-active-color="success" data-passive-color="danger" '.$check_string.'/>';

            return $enquiry_contacted;
        })
        ->addColumn('enquiry_view_career', function ($row) {
            $enquiry_view_career = '<ul role="menu" style="width: 70%;" class="table-action-icons d-flex justify-content-center">
            <li data-toggle="modal" data-target="#viewCareer"><a href="javascript:void(0);" class="view-career text-success" data-career-id="'. $row->enquiry_career_id .'" data-toggle="tooltip" title="view"><i class="fa fa-search" aria-hidden="true"></i></a></li>';

            $enquiry_view_career .= '</ul>';

            return $enquiry_view_career;
        })
        ->addColumn('action', function ($row) {
                $action = '<ul role="menu" style="width: 70%;" class="table-action-icons d-flex justify-content-center">
                <li><a href="javascript:;"  data-enquiry-id="' . $row->id . '"  class="sa-params text-danger"  data-toggle="tooltip" title="delete"><i class="fa fa-trash" aria-hidden="true"></a></li>';

                $action .= '</ul>';

                return $action;
            })
        ->addIndexColumn()
        ->rawColumns(['cv','enquiry_contacted','enquiry_view_career','action'])
        ->make(true);
    }

    public function service_enquiry_data(Request $request)
    {

        $enquiries = Enquiry::select('id','enquiry_name','enquiry_email','enquiry_mobile','enquiry_message','enquiry_contacted','enquiry_service_id')->whereNotNull('enquiry_service_id');

        $enquiries = $enquiries->get();

        return Datatables::of($enquiries)
        ->editColumn('enquiry_message', function ($row) {
            $enquiry_message = '<ul role="menu" style="width: 70%;" class="table-action-icons d-flex justify-content-center">
            <li data-toggle="modal" data-target="#viewEnquiryMessage"><a href="javascript:void(0);" class="view-enquiry-message text-success" data-enquiry-message-id="'. $row->id .'" data-toggle="tooltip" title="view"><i class="fa fa-eye" aria-hidden="true"></i></a></li>';

            $enquiry_message .= '</ul>';

            return $enquiry_message;
        })
        ->editColumn('enquiry_contacted', function ($row) {
            $row->enquiry_contacted == 'Yes'? $check_string = 'checked': $check_string ='';

            $enquiry_contacted = '<input id="enquiry-contact-check" type="checkbox" data-enquiry-id="'. $row->id .'" netliva-switch data-active-text="Yes " data-passive-text="No" data-active-color="success" data-passive-color="danger" '.$check_string.'/>';

            return $enquiry_contacted;
        })
        ->addColumn('enquiry_view_service', function ($row) {
            $enquiry_view_service = '<ul role="menu" style="width: 70%;" class="table-action-icons d-flex justify-content-center">
            <li data-toggle="modal" data-target="#viewService"><a href="javascript:void(0);" class="view-service text-success" data-service-id="'. $row->enquiry_service_id .'" data-toggle="tooltip" title="view"><i class="fa fa-search" aria-hidden="true"></i></a></li>';

            $enquiry_view_service .= '</ul>';

            return $enquiry_view_service;
        })
        ->addColumn('action', function ($row) {
                $action = '<ul role="menu" style="width: 70%;" class="table-action-icons d-flex justify-content-center">
                <li><a href="javascript:;"  data-enquiry-id="' . $row->id . '"  class="sa-params text-danger"  data-toggle="tooltip" title="delete"><i class="fa fa-trash" aria-hidden="true"></a></li>';

                $action .= '</ul>';

                return $action;
            })
        ->addIndexColumn()
        ->rawColumns(['enquiry_message','enquiry_contacted','enquiry_view_service','action'])
        ->make(true);
    }

    public function product_enquiry_data(Request $request)
    {

        $enquiries = Enquiry::select('id','enquiry_name','enquiry_email','enquiry_mobile','enquiry_message','enquiry_contacted','enquiry_product_id')->whereNotNull('enquiry_product_id');

        $enquiries = $enquiries->get();

        return Datatables::of($enquiries)
        ->editColumn('enquiry_message', function ($row) {
            $enquiry_message = '<ul role="menu" style="width: 70%;" class="table-action-icons d-flex justify-content-center">
            <li data-toggle="modal" data-target="#viewEnquiryMessage"><a href="javascript:void(0);" class="view-enquiry-message text-success" data-enquiry-message-id="'. $row->id .'" data-toggle="tooltip" title="view"><i class="fa fa-eye" aria-hidden="true"></i></a></li>';

            $enquiry_message .= '</ul>';

            return $enquiry_message;
        })
        ->editColumn('enquiry_contacted', function ($row) {
            $row->enquiry_contacted == 'Yes'? $check_string = 'checked': $check_string ='';

            $enquiry_contacted = '<input id="enquiry-contact-check" type="checkbox" data-enquiry-id="'. $row->id .'" netliva-switch data-active-text="Yes " data-passive-text="No" data-active-color="success" data-passive-color="danger" '.$check_string.'/>';

            return $enquiry_contacted;
        })
        ->addColumn('enquiry_view_product', function ($row) {
            $enquiry_view_service = '<ul role="menu" style="width: 70%;" class="table-action-icons d-flex justify-content-center">
            <li data-toggle="modal" data-target="#viewProduct"><a href="javascript:void(0);" class="view-product text-success" data-product-id="'. $row->enquiry_product_id .'" data-toggle="tooltip" title="view"><i class="fa fa-search" aria-hidden="true"></i></a></li>';

            $enquiry_view_service .= '</ul>';

            return $enquiry_view_service;
        })
        ->addColumn('action', function ($row) {
                $action = '<ul role="menu" style="width: 70%;" class="table-action-icons d-flex justify-content-center">
                <li><a href="javascript:;"  data-enquiry-id="' . $row->id . '"  class="sa-params text-danger"  data-toggle="tooltip" title="delete"><i class="fa fa-trash" aria-hidden="true"></a></li>';

                $action .= '</ul>';

                return $action;
            })
        ->addIndexColumn()
        ->rawColumns(['enquiry_message','enquiry_contacted','enquiry_view_product','action'])
        ->make(true);
    }


}
