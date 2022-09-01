<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use Auth;
use Image;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function AdminSlider()
    {
        $sliders = Slider::latest()->get();
        return view('admin.slider.index', compact('sliders'));
    }

    public function AddSlider()
    {
        return view('admin.slider.create');
    }

    public function StoreSlider(Request $request)
    {
        $slider_image = $request->file('image');

        // Storing Image using Image Intervention
        $image_id_generator = hexdec(uniqid()) . '.' . $slider_image->getClientOriginalExtension();
        Image::make($slider_image)->resize(1920, 1088)->save('image/slider/' . $image_id_generator);
        $final_image = 'image/slider/' . $image_id_generator;

        Slider::insert([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $final_image,
            'created_at' => Carbon::now()
        ]);
        return Redirect()->route('admin.slider')->with('success', 'Slider added successfully!');
    }

    public function Logout()
    {
        Auth::logout();
        return Redirect()->route('login');
    }
}
