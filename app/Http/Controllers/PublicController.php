<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\User;
use App\Models\Project;
use App\Models\Experience;
use App\Models\Testimonial;

class PublicController extends Controller
{
    public function index()
    {
        // Ambil settings dari database, ubah menjadi array key => value
        $settingsCollection = Setting::all(); // misal ada tabel settings
        $settings = $settingsCollection->pluck('value', 'key')->toArray();

        // Ambil owner user
        $owner = User::first();

        // Ambil data project, experience, testimonial
        $projects = Project::latest()->get();
        $experiences = Experience::latest()->get();
        $testimonials = Testimonial::where('is_published', true)->latest()->get();

        return view('welcome', compact(
            'projects',
            'experiences',
            'testimonials',
            'settings',
            'owner'
        ));
    }
}