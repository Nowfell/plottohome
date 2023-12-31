<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\AdminProductRequest;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductImage;
use App\Models\Product;
use Datatables;

class AdminProductController extends AdminBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->products = Product::all();
        return view('admin.products.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product();
        $product->product_name = $request->product_name;
        $product->product_summary = $request->product_summary;
        $product->product_description = $request->product_description;
        $product->save();

        if($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
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
                $image->move(public_path().'/Product Images/', $filenametostore);

                $data[] = $filenametostore;
            }
        }

        $product_image = new ProductImage();
        $product_image->product_id = $product->id;
        $product_image->image_names = json_encode($data);
        $product_image->save();

        return redirect()->route('admin.products.index')->with('success','Added Product Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        $product_image = ProductImage::findOrFail($product->id);

       return response()->json([
           'product' => $product,
           'product_image' => $product_image
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->product = Product::findOrFail($id);
        $image_names = json_decode($this->product->product_image->image_names);
        $this->product_images = [];

        foreach ($image_names as $image_index => $image_name) {

            $product_images[] = $image_name;

        }

        $this->product_images = $product_images;

        return view('admin.products.edit',$this->data);
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
        // dd($request->preloaded);
        // $preloaded_index = 0;
        $preloaded = $request->preloaded;

        $product = Product::findOrFail($id);
        $preloaded_images = json_decode($product->product_image->image_names);

        foreach ($preloaded_images as $preloaded_image_index => $preloaded_image) {
            if(in_array($preloaded_image_index,$preloaded)){
                $new_images_arr[] = $preloaded_image;
            }
            else{
                $image_path = public_path("Product Images/".$preloaded_image);
                if(File::exists($image_path)){

                    File::delete($image_path);

                }
            }
        }

        if($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
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
                $image->move(public_path().'/Product Images/', $filenametostore);

                $new_images_arr[] = $filenametostore;
            }
        }

        $product->product_name = $request->product_name;
        $product->product_summary = $request->product_summary;
        $product->product_description = $request->product_description;
        $product->save();

        $product->product_image->image_names = json_encode($new_images_arr);
        $product->product_image->save();

        return redirect()->route('admin.products.index')->with('success','Updated Product Successfully');
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
            $product = Product::findOrFail($id);
            $image_names = json_decode($product->product_image->image_names);

            foreach ($image_names as $image_name) {
                $image_path = public_path("Product Images/".$image_name);
                if(File::exists($image_path)){

                    File::delete($image_path);

                }
            }
            $product->product_image->delete();
            $product->delete();
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

        $products = Product::select('id','product_name');

        $products = $products->get();

    return Datatables::of($products)
    ->addColumn('action', function ($row) {

        $action = '<ul role="menu" style="width: 70%;" class="table-action-icons d-flex justify-content-between">
          <li><a href="'. route('admin.products.edit', [$row->id]) .'" class="text-primary" data-toggle="tooltip" title="edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></li>
          <li  data-toggle="modal" data-target="#viewProduct"><a href="javascript:void(0);" class="view-product text-success" data-product-id="'. $row->id .'" data-toggle="tooltip" title="view"><i class="fa fa-eye" aria-hidden="true"></i></a></li>
          <li><a href="javascript:;"  data-product-id="' . $row->id . '"  class="sa-params text-danger"  data-toggle="tooltip" title="delete"><i class="fa fa-trash" aria-hidden="true"></a></li>';

        $action .= '</ul>';

        return $action;
    })
    ->addIndexColumn()
    ->rawColumns(['action'])
    ->make(true);
    }
}
