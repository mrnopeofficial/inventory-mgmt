<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\About;
use App\Models\Service;
use App\Models\Passion;
use App\Models\Contact;
use App\Models\User;
use App\Models\ContactForm;
use Auth;
use Image;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    
    public function Logout()
    {
        Auth::logout();
        return Redirect()->route('login');
    }

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
        Image::make($image)->save('image/slider/' . $image_id_generator);
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
        elseif ($title && $description) {
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

    public function StoreAbout(Request $request)
    {
        About::insert([
            'title' => $request->title,
            'short_desc' => $request->short_desc,
            'long_desc' => $request->long_desc,
            'created_at' => Carbon::now()
        ]);
        return Redirect()->route('admin.about')->with('success', 'About added successfully!');
    }

    public function EditAbout($id)
    {
        $about = About::find($id);
        return view('admin.about.edit', compact('about'));
    }

    public function UpdateAbout(Request $request, $id)
    {
        About::find($id)->update([
            'title' => $request->title,
            'short_desc' => $request->short_desc,
            'long_desc' => $request->long_desc,
            'created_at' => Carbon::now()
        ]);
        return Redirect()->route('admin.about')->with('success', 'About updated successfully!');
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

    public function StoreService(Request $request)
    {
        Service::insert([
            'title' => $request->title,
            'description' => $request->description,
            'created_at' => Carbon::now()
        ]);
        return Redirect()->route('admin.service')->with('success', 'Service added successfully!');
    }

    public function EditService($id)
    {
        $service = About::find($id);
        return view('admin.service.edit', compact('service'));
    }

    public function UpdateService(Request $request, $id)
    {
        Service::find($id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'created_at' => Carbon::now()
        ]);
        return Redirect()->route('admin.service')->with('success', 'Service updated successfully!');
    }

    public function DeleteService($id)
    {
        $delete = Service::find($id)->Delete();
        return Redirect()->back()->with('success', 'Service deleted successfully!');
    }

    public function AdminContact()
    {
        $contacts = Contact::all();
        return view('admin.contact.index',compact('contacts'));
    }

    public function AddContact(){
        return view('admin.contact.create');
    }

    public function StoreContact(Request $request)
    {
        Contact::insert([
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'created_at' => Carbon::now()
        ]);
        return Redirect()->route('admin.contact')->with('success', 'Contact added successfully!');
    }

    public function EditContact($id)
    {
        $contact = Contact::find($id);
        return view('admin.contact.edit', compact('contact'));
    }

    public function UpdateContact(Request $request, $id)
    {
        Contact::find($id)->update([
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'created_at' => Carbon::now()
        ]);
        return Redirect()->route('admin.contact')->with('success', 'Contact updated successfully!');
    }

    public function DeleteContact($id)
    {
        $delete = Contact::find($id)->Delete();
        return Redirect()->back()->with('success', 'Contact deleted successfully!');
    }

    public function AdminContactForm()
    {
        $contactforms = ContactForm::all();
        return view('admin.contact.form',compact('contactforms'));
    }

    public function DeleteContactForm($id)
    {
        $delete = ContactForm::find($id)->Delete();
        return Redirect()->back()->with('success', 'Message deleted successfully!');
    }

    public function ChangePassword()
    {
        return view('admin.body.change_password');
    }

    public function UpdatePassword(Request $request)
    {
        $validateData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed'
        ]);
        $hashedPassword = Auth::user()->password;
        if(Hash::check($request->oldpassword,$hashedPassword)){
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect()->route('login')->with('success', 'Password changed successfully');
        } else {
            return redirect()->back()->with('error', 'Password change error');
        }
    }

    public function UpdateProfile()
    {
        if(Auth::user()){
            $user = User::find(Auth::user()->id);
            if($user) {
                return view('admin.body.update_profile',compact('user'));
            }
        }
    }

    public function SaveProfile(Request $request)
    {
        $user = User::find(Auth::user()->id);
        if($user) {
            $user->name = $request['name'];
            $user->email = $request['email'];
            $user->save();

            return Redirect()->back()->with('success', 'Profile update successfully');
        } else {
            return Redirect()->back();
        }
    }

    //PASSION CONTROLLER
    public function AdminPassion()
    {
        $passions = Passion::latest()->get();
        return view('admin.passion.index', compact('passions'));
    }

    public function AddPassion()
    {
        return view('admin.passion.create');
    }

    public function StorePassion(Request $request)
    {
        $image = $request->file('image');

        // Storing Image using Image Intervention
        $image_id_generator = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->save('image/passion/' . $image_id_generator);
        $final_image = 'image/passion/' . $image_id_generator;

        Passion::insert([
            'title' => $request->title,
            'description' => $request->description,
            'story' => $request->story,
            'image' => $final_image,
            'created_at' => Carbon::now()
        ]);
        return Redirect()->route('admin.passion')->with('success', 'Passion added successfully!');
    }

    public function EditPassion($id)
    {
        $passions = Passion::find($id);
        return view('admin.passion.edit', compact('passions'));
    }

    public function UpdatePassion(Request $request, $id)
    {

        //Assigning unique ID to Passion image
        $old_image = $request->old_image;
        $image = $request->file('image');
        $title = $request->title;
        $description = $request->description;
        $story = $request->story;

        //Function to update title, description, story and image
        if ($image) {
            $image_id_generator = hexdec(uniqid());
            $image_extension = strtolower($image->getClientOriginalExtension());
            $image_name = $image_id_generator . '.' . $image_extension;
            $up_location = 'image/passion/';
            $final_image = $up_location . $image_name;
            $image->move($up_location, $image_name);
            unlink($old_image);

            Passion::find($id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'story' => $request->story,
                'image' => $final_image,
                'created_at' => Carbon::now()
            ]);

            return Redirect()->back()->with('success', 'Passion updated successfully!');
        }

        //Function to update title, description and image
        if ($image && $title && $description) {
            $image_id_generator = hexdec(uniqid());
            $image_extension = strtolower($image->getClientOriginalExtension());
            $image_name = $image_id_generator . '.' . $image_extension;
            $up_location = 'image/passion/';
            $final_image = $up_location . $image_name;
            $image->move($up_location, $image_name);
            unlink($old_image);

            Passion::find($id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'image' => $final_image,
                'created_at' => Carbon::now()
            ]);

            return Redirect()->back()->with('success', 'Passion updated successfully!');
        }

        //Function to update title, story and image
        if ($image && $story && $description) {
            $image_id_generator = hexdec(uniqid());
            $image_extension = strtolower($image->getClientOriginalExtension());
            $image_name = $image_id_generator . '.' . $image_extension;
            $up_location = 'image/passion/';
            $final_image = $up_location . $image_name;
            $image->move($up_location, $image_name);
            unlink($old_image);

            Passion::find($id)->update([
                'title' => $request->title,
                'story' => $request->story,
                'image' => $final_image,
                'created_at' => Carbon::now()
            ]);

            return Redirect()->back()->with('success', 'Passion updated successfully!');
        }

        //Function to update tittle & image
        elseif ($image && $title) {
            $image_id_generator = hexdec(uniqid());
            $image_extension = strtolower($image->getClientOriginalExtension());
            $image_name = $image_id_generator . '.' . $image_extension;
            $up_location = 'image/passion/';
            $final_image = $up_location . $image_name;
            $image->move($up_location, $image_name);
            unlink($old_image);

            Passion::find($id)->update([
                'title' => $request->title,
                'image' => $final_image,
                'created_at' => Carbon::now()
            ]);

            return Redirect()->back()->with('success', 'Passion updated successfully!');
        }

        //Function to update description & image
        elseif ($image && $description) {
            $image_id_generator = hexdec(uniqid());
            $image_extension = strtolower($image->getClientOriginalExtension());
            $image_name = $image_id_generator . '.' . $image_extension;
            $up_location = 'image/passion/';
            $final_image = $up_location . $image_name;
            $image->move($up_location, $image_name);
            unlink($old_image);

            Passion::find($id)->update([
                'image' => $final_image,
                'created_at' => Carbon::now()
            ]);

            return Redirect()->back()->with('success', 'Passion updated successfully!');
        }

        //Function to update title or description or story
        elseif ($title && $description && $story) {
            Passion::find($id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'story' => $request->story,
                'created_at' => Carbon::now()
            ]);

            return Redirect()->back()->with('success', 'Passion updated successfully!');
        }

        //Function to update passion title only 
        else {
            Passion::find($id)->update([
                'title' => $request->title,
                'created_at' => Carbon::now()
            ]);
            return Redirect()->back()->with('success', 'Passion updated successfully!');
        }
    }

    public function DeletePassion($id)
    {
        $image = Passion::find($id);
        $old_image = $image->image;
        unlink($old_image);

        Passion::find($id)->delete();
        return Redirect()->back()->with('success', 'Passion deleted successfully!');
    }
}
