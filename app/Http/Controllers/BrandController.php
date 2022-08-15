<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Multipic;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use Image;

class BrandController extends Controller
{
    public function AllBrand()
    {

        $brands = Brand::latest()->paginate(5);
        return view('admin.brand.index', compact('brands'));
    }

    public function AddBrand(Request $request)
    {
        $validated = $request->validate(
            [
                'brand_name' => 'required|unique:brands|min:3',
                'brand_image' => 'required|mimes:jpg,jpeg,png'
            ],
            [
                'brand_name.required' => 'Please Input Brand Name',
                'brand_name.min' => 'Please Use Longer Brand Name',
                'brand_name.unique' => 'Please Use Different Brand Name'
            ]
        );
        $brand_image = $request->file('brand_image');

        // Storing Image ver 1
        // $image_id_generator = hexdec(uniqid());
        // $image_extension = strtolower($brand_image->getClientOriginalExtension());
        // $image_name = $image_id_generator . '.' . $image_extension;
        // $up_location = 'image/brand/';
        // $final_image = $up_location . $image_name;
        // $brand_image->move($up_location, $image_name);

        // Storing Image using Image Intervention
        $image_id_generator = hexdec(uniqid()) . '.' . $brand_image->getClientOriginalExtension();
        Image::make($brand_image)->resize(300, 300)->save('image/brand/' . $image_id_generator);
        $final_image = 'image/brand/' . $image_id_generator;

        Brand::insert([
            'brand_name' => $request->brand_name,
            'brand_image' => $final_image,
            'created_at' => Carbon::now()
        ]);
        return Redirect()->back()->with('success', 'Brand inserted successfully!');
    }

    public function Edit($id)
    {
        $brands = Brand::find($id);
        return view('admin.brand.edit', compact('brands'));
    }

    public function Update(Request $request, $id)
    {
        // Data input validation
        $validated = $request->validate(
            [
                'brand_name' => 'required|min:3',
            ],
            [
                'brand_name.required' => 'Please Input Brand Name',
                'brand_name.min' => 'Please Use Longer Brand Name'
            ]
        );

        //Assigning unique ID to brand image
        $old_image = $request->old_image;
        $brand_image = $request->file('brand_image');

        //Function to update brand name & brand image
        if ($brand_image) {
            $image_id_generator = hexdec(uniqid());
            $image_extension = strtolower($brand_image->getClientOriginalExtension());
            $image_name = $image_id_generator . '.' . $image_extension;
            $up_location = 'image/brand/';
            $final_image = $up_location . $image_name;
            $brand_image->move($up_location, $image_name);
            unlink($old_image);

            Brand::find($id)->update([
                'brand_name' => $request->brand_name,
                'brand_image' => $final_image,
                'created_at' => Carbon::now()
            ]);

            return Redirect()->back()->with('success', 'Brand updated successfully!');
        }

        //Function to update brand name only 
        else {
            Brand::find($id)->update([
                'brand_name' => $request->brand_name,
                'created_at' => Carbon::now()
            ]);
            return Redirect()->back()->with('success', 'Brand updated successfully!');
        }
    }

    public function Delete($id)
    {
        $image = Brand::find($id);
        $old_image = $image->brand_image;
        unlink($old_image);

        Brand::find($id)->delete();
        return Redirect()->back()->with('success', 'Brand deleted successfully!');
    }

    public function MultiPic()
    {
        $images = Multipic::all();
        return view('admin.multipic.index', compact('images'));
    }

    public function AddImage(Request $request)
    {

        $image = $request->file('image');

        // Storing Multiple Image using Image Intervention
        foreach ($image as $multi_image) {
            $image_id_generator = hexdec(uniqid()) . '.' . $multi_image->getClientOriginalExtension();
            Image::make($multi_image)->resize(300, 300)->save('image/multi/' . $image_id_generator);
            $final_image = 'image/multi/' . $image_id_generator;

            Multipic::insert([
                'image' => $final_image,
                'created_at' => Carbon::now()
            ]);
        } //end of for loop
        return Redirect()->back()->with('success', 'Multi image inserted successfully!');
    }
}
