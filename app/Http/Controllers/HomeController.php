<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $types=Item::TYPES;
     $items=Item::where('status','active')
            ->orderby('updated_at')->limit(3)->get();

        return view('home.index',compact('items','types'));
    }
}

