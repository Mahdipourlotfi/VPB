<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
     
    public function __construct()
    {
        
        $path = storage_path("app/private/languages.json");
        
        //Check if the file exists
        if (file_exists($path)) {
            $fileContent = file_get_contents($path);
            $rooms = json_decode($fileContent, true);
            // foreach($rooms as $item) {
            //     dd($item['Code']); // $name is the Name of Room
            // }
           
        } else {
            dd("File not found");
        }

        $this->middleware('auth');

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::check()) {
            $lng=Settings::where(['user_id'=>1,'settingsitems_id'=>1])->first()->value ?? null;
            Session::put('locale', $lng);
            App::setLocale($lng);
        }

        //return view('home');
        return view('home');

    }
}
