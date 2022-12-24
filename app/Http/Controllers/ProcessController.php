<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProcessController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|string',
            'image' => 'required|file',
        ], [
            'name.required' => 'Please enter NFT name.',
            'email.required' => 'Please enter NFT description.',
            'price.required' => 'Please enter NFT price.',
            'image.required' => 'Please enter NFT image.',
        ]);


        $name = $request->input('name');
        $description = $request->input('description');
        $price = $request->input('price');
        $image = $request->file('image')->path();

        $imageData = File::get($image);
        $base64 = base64_encode($imageData);

        dd([$name, $description, $price, $base64]);
        // Process the form data and take any necessary action

        // return redirect()->back();
    }
}
