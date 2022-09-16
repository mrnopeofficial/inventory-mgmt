<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\About;
use App\Models\Service;
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
        $image = $request->file('image');

        // Storing Image using Image Intervention
        $image_id_generator = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(1920, 1088)->save('image/slider/' . $image_id_generator);
        $final_image = 'image/slider/' . $image_id_generator;

        Slider::insert([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $final_image,
            'created_at' => Carbon::now()
        ]);
        return Redirect()->route('admin.slider')->with('success', 'Slider added successfully!');
    }

    public function Edit($id)
    {
        $sliders = Slider::find($id);
        return view('admin.slider.edit', compact('sliders'));
    }

    public function Update(Request $request, $id)
    {

        //Assigning unique ID to slider image
        $old_image = $request->old_image;
        $image = $request->file('image');
        $title = $request->title;
        $description = $request->description;

        //Function to update title, description and image
        if ($image) {
            $image_id_generator = hexdec(uniqid());
            $image_extension = strtolower($image->getClientOriginalExtension());
            $image_name = $image_id_generator . '.' . $image_extension;
            $up_location = 'image/slider/';
            $final_image = $up_location . $image_name;
            $image->move($up_location, $image_name);
            unlink($old_image);

            Slider::find($id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'image' => $final_image,
                'created_at' => Carbon::now()
            ]);

            return Redirect()->back()->with('success', 'Slider updated successfully!');
        }

        //Function to update tittle & image
        elseif ($image && $title) {
            $image_id_generator = hexdec(uniqid());
            $image_extension = strtolower($image->getClientOriginalExtension());
            $image_name = $image_id_generator . '.' . $image_extension;
            $up_location = 'image/slider/';
            $final_image = $up_location . $image_name;
            $image->move($up_location, $image_name);
            unlink($old_image);

            Slider::find($id)->update([
                'title' => $request->title,
                'image' => $final_image,
                'created_at' => Carbon::now()
            ]);

            return Redirect()->back()->with('success', 'Slider updated successfully!');
        }

        //Function to update description & image
        elseif ($image && $description) {
            $image_id_generator = hexdec(uniqid());
            $image_extension = strtolower($image->getClientOriginalExtension());
            $image_name = $image_id_generator . '.' . $image_extension;
            $up_location = 'image/slider/';
            $final_image = $up_location . $image_name;
            $image->move($up_location, $image_name);
            unlink($old_image);

            Slider::find($id)->update([
                'image' => $final_image,
                'created_at' => Carbon::now()
            ]);

            return Redirect()->back()->with('success', 'Slider updated successfully!');
        }
        
        //Function to update title & description
        elseif($title && $description) {
            Slider::find($id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'created_at' => Carbon::now()
            ]);

            return Redirect()->back()->with('success', 'Slider updated successfully!');

        }

        //Function to update slider title only 
        else {
            Slider::find($id)->update([
                'title' => $request->title,
                'created_at' => Carbon::now()
            ]);
            return Redirect()->back()->with('success', 'Slider updated successfully!');
        }
    }

    public function Delete($id)
    {
        $image = Slider::find($id);
        $old_image = $image->image;
        unlink($old_image);

        Slider::find($id)->delete();
        return Redirect()->back()->with('success', 'Slider deleted successfully!');
    }

    public function AdminAbout()
    {
        $about = About::latest()->get();
        return view('admin.about.index', compact('about'));
    }

    public function AddAbout()
    {
        return view('admin.about.create');
    }
    
    public function StoreAbout(Request $request) {
        About::insert([
            'title'=> $request->title,
            'short_desc'=> $request->short_desc,
            'long_desc'=> $request->long_desc,
            'created_at'=> Carbon::now()
        ]);
        return Redirect()->route('admin.about')->with('success', 'About added successfully!');
    }

    public function EditAbout($id){
        $about = About::find($id);
        return view('admin.about.edit', compact('about'));
    }

    public function UpdateAbout(Request $request, $id){
        About::find($id)->update([
            'title'=> $request->title,
            'short_desc'=> $request->short_desc,
            'long_desc'=> $request->long_desc,
            'created_at'=> Carbon::now()
        ]);
        return Redirect()->route('admin.about')->with('success', 'About updated successfully!');
    }

    public function Logout()
    {
        Auth::logout();
        return Redirect()->route('login');
    }

    public function DeleteAbout($id)
    {
        $delete = About::find($id)->Delete();
        return Redirect()->back()->with('success', 'About deleted successfully!');
    }

    public function AdminService()
    {
        $service = Service::get();
        return view('admin.service.index', compact('service'));
    }

    public function AddService()
    {
        return view('admin.service.create');
    }
    
    public function StoreService(Request $request) {
        Service::insert([
            'title'=> $request->title,
            'description'=> $request->description,
            'created_at'=> Carbon::now()
        ]);
        return Redirect()->route('admin.service')->with('success', 'Service added successfully!');
    }

    public function EditService($id){
        $service = About::find($id);
        return view('admin.service.edit', compact('service'));
    }

    public function UpdateService(Request $request, $id){
        Service::find($id)->update([
            'title'=> $request->title,
            'description'=> $request->description,
            'created_at'=> Carbon::now()
        ]);
        return Redirect()->route('admin.service')->with('success', 'Service updated successfully!');
    }

    public function DeleteService($id)
    {
        $delete = Service::find($id)->Delete();
        return Redirect()->back()->with('success', 'Service deleted successfully!');
    }
}
