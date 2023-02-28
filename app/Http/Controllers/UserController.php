<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\User;
use App\Models\Service;
use App\Models\Passion;
use App\Models\Multipic;
use App\Models\ContactForm;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function Portfolio()
    {
        $multipics = Multipic::all();
        return view('pages.portfolio', compact('multipics'));
    }

    public function PassionDetail($id) {
        $passions = Passion::find($id);
        return view('pages.passion-detail',compact('passions'));
    }

    public function Contact()
    {
        $contacts = DB::table('contacts')->first();
        return view('pages.contact', compact('contacts'));
    }

    public function StoreContactForm(Request $request)
    {
        ContactForm::insert([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
            'created_at' => Carbon::now()
        ]);
        return Redirect()->route('contact')->with('success', 'Your message sent successfully!');
    }
}
