<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Experience;
use App\Models\About;
use App\Models\Skill;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;
use App\Models\Setting;

class PageController extends Controller
{
    public function home()
    {
        $featuredExperiences = Experience::where('is_featured', true)->latest()->take(2)->get();
        $latestExperiences = Experience::where('is_featured', false)->whereNotNull('slug')->latest()->take(2)->get();

        $abouts = About::where('is_showcased', true)->latest()->get()->groupBy('category');

        $skills = Skill::where('is_showcased', true)->latest()->take(8)->get();

        return view('home', [
            'featuredExperiences' => $featuredExperiences,
            'latestExperiences' => $latestExperiences,
            'abouts' => $abouts,
            'skills' => $skills,
        ]);
    }

    public function contact()
    {
        $siteSettings = Setting::pluck('value', 'key')->all();
        return view('contact', compact('siteSettings'));
    }

    public function storeContactForm(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        $settings = Setting::pluck('value', 'key')->all();
        $recipientEmail = $settings['contact_email'] ?? 'anwarfaishal86@gmail.com';

        Mail::to($recipientEmail)->send(new ContactFormMail($data));

        return redirect()->route('contact')->with('success', 'Your message has been sent successfully!');
    }

    public function sitemap()
    {
        $experiences = Experience::latest()->get();

        return response()->view('sitemap', [
            'experiences' => $experiences,
        ])->header('Content-Type', 'text/xml');
    }
}
