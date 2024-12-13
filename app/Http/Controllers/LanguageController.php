<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use App\Models\Blog\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function change(Request $request)
    {
        $lang = $request->lang;

        if (!in_array($lang, ['en', 'fa', 'fr'])) {
            abort(400);
        }

        Session::put('locale', $lang);

        if (Auth::check()==true) {
            $id = Auth::id();
            Settings::updateOrCreate([    'user_id'=>  $id,'settingsitems_id'=> 1],    ['value'=> $lang]); 
        } else {
            //dont save
        }

        return redirect()->back();
    }
     
}
