<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProcessController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'recipientAddress' => 'required|string',
            'image' => 'required|file',
        ], [
            'name.required' => 'Please enter NFT name.',
            'email.required' => 'Please enter NFT description.',
            'recipientAddress.required' => 'Please enter NFT recipientAddress.',
            'image.required' => 'Please enter NFT image.',
        ]);


        $name = $request->input('name');
        $description = $request->input('description');
        $recipientAddress = $request->input('recipientAddress');
        $image = $request->file('image');

        $imageData = File::get($image->path());
        $base64 = base64_encode($imageData);
        $base64 = 'data:' . $image->getMimeType() . ';name=' . $image->getClientOriginalName() . ';base64,' . $base64;

        dd([$name, $description, $recipientAddress, $base64]);
        // Process the form data and take any necessary action

        // return redirect()->back();



    }

    private function mint($name, $description, $base64, $filename, $recipientAddress)
    {
        $client = new Client();
        $response = $client('https://api.verbwire.com/v1/nft/mint/mintFromFile', [
            'multipart' => [
                [
                    'name' => 'allowPlatformToOperateToken',
                    'contents' => 'true'
                ],
                [
                    'name' => 'chain',
                    'contents' => 'goerli'
                ],
                [
                    'name' => 'filePath',
                    'filename' => $filename,
                    'contents' => $base64,
                    'headers' => [
                        'Content-Type' => 'image/png'
                    ]
                ],
                [
                    'name' => 'name',
                    'contents' => $name
                ],
                [
                    'name' => 'description',
                    'contents' => $description
                ],
                [
                    'name' => 'contractAddress',
                    'contents' => '0xEfe83FBb362ffDC1b8f2e4ADaA41B0F2E65C65fF'
                ],
                [
                    'name' => 'recipientAddress',
                    'contents' => $recipientAddress
                ]
            ],
            'headers' => [
                'X-API-Key' => env('VERBWIRE_API_KEY'),
                'accept' => 'application/json',
            ],
        ]);
        dd($response->getBody());
    }
}
