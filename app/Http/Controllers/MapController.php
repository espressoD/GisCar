<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MapController extends Controller
{
    //
    public function index()
    {
        $initialMarkers = [
            [
                'position' => [
                    'lat' => -7.8052485,
                    'lng' => 110.3642824
                ],
                'draggable' => false
            ],
            [
                'position' => [
                    'lat' => -7.7925927,
                    'lng' => 110.3658812
                ],
                'draggable' => false
            ],
            [
                'position' => [
                    'lat' => -7.8118994,
                    'lng' => 110.3632557
                ],
                'draggable' => true
            ]
        ];
        return view('maps', compact('initialMarkers'));
    }
}
