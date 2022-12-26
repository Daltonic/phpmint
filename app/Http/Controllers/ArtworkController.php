<?php

namespace App\Http\Controllers;
use App\Models\Artwork;


class ArtworkController extends Controller
{
    public function index()
    {
        $artworks = Artwork::all();
        return view('home', ['artworks' => $artworks]);
    }
}
