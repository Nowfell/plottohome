<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ClientProductController extends ClientBaseController
{
    public function products()
    {
        $this->pageTitle = '';
        $this->page = 'Products';
        $this->products = Product::all();

        return view('client.products', $this->data);
    }

    public function product($id)
    {
        $this->pageTitle = '';
        $this->page = 'Product Details';
        $this->product = Product::findOrFail($id);

        return view('client.product', $this->data);
    }
}
