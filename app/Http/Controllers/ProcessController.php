<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use App\Models\Artwork;
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
            'price' => 'required|string',
            'image' => 'required|file',
        ], [
            'name.required' => 'Please enter NFT name.',
            'email.required' => 'Please enter NFT description.',
            'recipientAddress.required' => 'Please enter NFT recipientAddress.',
            'price.required' => 'Please enter NFT price.',
            'image.required' => 'Please enter NFT image.',
        ]);


        $name = $request->input('name');
        $description = $request->input('description');
        $price = $request->input('price');
        $recipientAddress = $request->input('recipientAddress');
        $image = $request->file('image');
        $imageData = File::get($image->path());

        $client = new Client();
        $response = $client->post('https://api.verbwire.com/v1/nft/store/file', [
            'multipart' => [
                [
                    'name' => 'filePath',
                    'filename' => $image->getClientOriginalName(),
                    'contents' => $imageData,
                    'headers' => [
                        'Content-Type' => 'image/png'
                    ]
                ]
            ],
            'headers' => [
                'X-API-Key' => env('VERBWIRE_API_KEY'),
                'accept' => 'application/json',
            ],
        ]);

        $response = json_decode($response->getBody(), true);
        $ipfs_image = $response['ipfs_storage']['ipfs_url'];
        $this->mint($name, $description, $ipfs_image, $image->getClientOriginalName(), $recipientAddress, $price);

        $artwork = new Artwork();
        $artwork->name = $name;
        $artwork->description = $description;
        $artwork->price = floatval($price);
        $artwork->image = $ipfs_image;
        $artwork->save();

        return redirect()->back();
    }

    private function mint($name, $description, $ipfs_image, $recipientAddress, $price)
    {
        $client = new Client();
        $client->post('https://api.verbwire.com/v1/nft/mint/mintFromMetadata', [
            'multipart' => [
                [
                    'name' => 'chain',
                    'contents' => 'goerli'
                ],
                [
                    'name' => 'imageUrl',
                    'contents' => $ipfs_image
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
                    'contents' => env('VERBWIRE_CONTRACT')
                ],
                [
                    'name' => 'recipientAddress',
                    'contents' => $recipientAddress
                ],
                [
                    'name' => 'data',
                    'contents' => $price
                ]
            ],
            'headers' => [
                'X-API-Key' => env('VERBWIRE_API_KEY'),
                'accept' => 'application/json',
            ],
        ]);
    }
}
