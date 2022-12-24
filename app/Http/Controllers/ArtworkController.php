<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArtworkController extends Controller
{
    public function index()
    {
        $artworks = [
            [
                'id' => 1,
                'image' => 'https://images.pexels.com/photos/2035489/pexels-photo-2035489.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2',
                'price' => 2.1,
            ],
            [
                'id' => 2,
                'image' => 'https://images.pexels.com/photos/6429315/pexels-photo-6429315.jpeg?auto=compress&cs=tinysrgb&w=600',
                'price' => 1.4,
            ],
            [
                'id' => 3,
                'image' => 'https://images.pexels.com/photos/13687124/pexels-photo-13687124.jpeg?auto=compress&cs=tinysrgb&w=600',
                'price' => 1.9,
            ],
            [
                'id' => 4,
                'image' => 'https://images.pexels.com/photos/9541100/pexels-photo-9541100.jpeg?auto=compress&cs=tinysrgb&w=600',
                'price' => 2.3,
            ],
            [
                'id' => 5,
                'image' => 'https://images.pexels.com/photos/3736253/pexels-photo-3736253.jpeg?auto=compress&cs=tinysrgb&w=600',
                'price' => 1.5,
            ],
        ];

        return view('home', compact('artworks'));
    }
}
