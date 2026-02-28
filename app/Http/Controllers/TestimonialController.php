<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil semua testimoni, yang terbaru di atas
        $testimonials = \App\Models\Testimonial::latest()->get();
        return view('testimonials.index', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Testimonial::create([
            'name' => $request->name,
            'comment' => $request->comment,
            'rating' => $request->rating,
            'content' => $request->comment, // misal isi sama dengan comment
        ]);

        return redirect()->back()
            ->with('success', 'Terima kasih! Testimoni Anda sedang menunggu moderasi admin.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(\App\Models\Testimonial $testimonial)
    {
        $testimonial->delete();
        return redirect()->back()->with('success', 'Testimoni berhasil dihapus.');
    }

    public function approve($id) 
    {
        $testimonial = Testimonial::findOrFail($id);
        $testimonial->is_published = 1;
        $testimonial->save();

        return redirect()->back()->with('success', 'Testimonial approved!');
    }
}
