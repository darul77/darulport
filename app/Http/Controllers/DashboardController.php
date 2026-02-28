<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Experience;
use App\Models\Testimonial;

class DashboardController extends Controller
{
    public function index()
    {
        $projectCount = Project::count();
        $experienceCount = Experience::count();
        $testimonialCount = Testimonial::count();

        $averageRating = Testimonial::avg('rating') ?? 0;

        $testimonials = Testimonial::latest()->take(5)->get(); // 5 testimoni terbaru
        $recentProjects = Project::latest()->take(5)->get(); // 5 project terbaru

        return view('dashboard', compact(
            'projectCount',
            'experienceCount',
            'testimonialCount',
            'averageRating',
            'testimonials',
            'recentProjects'
        ));
    }
}