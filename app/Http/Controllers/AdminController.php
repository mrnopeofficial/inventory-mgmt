<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use Auth;

class AdminController extends Controller
{
    public function AdminSlider()
    {
        $sliders = Slider::latest()->get();
        return view('admin.slider.index', compact('sliders'));
    }

    public function Logout()
    {
        Auth::logout();
        return Redirect()->route('login');
    }
}
