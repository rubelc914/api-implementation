<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $client = new \GuzzleHttp\Client();
        $url    = 'http://localhost:8000/api/login';
        $data['email']  = 'rubelc914@gmail.com';
        $data['password'] = '914325';

        $request = $client->post($url,[
            'form_params' => $data
        ]);
        $response = $request->getBody();
        $info =json_decode($response,true);
        $token = $info['data']['token'];
        // dd($token);
        $product_url = 'http://127.0.0.1:8000/api/products';
        $product_request = $client->get($product_url,[
            'headers' => [
                'Authorization' =>'Bearer ' .$token, //add a space after 'Bearer '
            ],
        ]);
        $product_response = json_decode($product_request->getBody(),true);
        $products = $product_response['data'];
        return view('products.allProducts',compact('products'));

    }
}
