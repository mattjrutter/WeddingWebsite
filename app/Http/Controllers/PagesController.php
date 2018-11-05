<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mapper;
date_default_timezone_set("America/Denver");

class PagesController extends Controller
{
    public function index(){
        Mapper::map(
            39.091227,
            -108.471653,
            [
                'zoom' => 14,
                'draggable' => false,
                'marker' => true
            ]
        );
        return view('pages.index');
    }

    public function gallery(){
        return view('pages.gallery');
    }
}
