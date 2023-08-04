<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class APIController extends Controller
{
    public function fetchAPI () {
        $wordOfTheDay = Http::get('https://random-word-api.vercel.app/api?words=1');
        $word = $wordOfTheDay[0];
        return view("api", compact("word"));
    }
}
