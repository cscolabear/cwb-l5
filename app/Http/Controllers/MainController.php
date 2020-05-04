<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Repositories\CountysRepository;
// use App\Repositories\LinkRepository;

class MainController extends Controller
{
    public function index()
    {
        $countys = (new CountysRepository())->get();

        return view('main', ['countys' => $countys]);
    }
}
