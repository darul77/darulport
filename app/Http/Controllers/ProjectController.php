<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Project;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil semua data project dan mengurutkan dari yang terbaru
        $projects = Project::latest()->get();
        
        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Validasi Input (Sangat Penting untuk Keamanan)
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048', // Maksimal 2MB
        ]);

        // 2. Mengolah Upload Foto
        $imagePath = null;
        if ($request->hasFile('image')) {
            // Simpan foto ke folder storage/app/public/projects
            $imagePath = $request->file('image')->store('projects', 'public');
        }

        // 3. Simpan ke Database
        Project::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath,
            'link' => $request->link,
        ]);

        return redirect()->route('projects.index')->with('success', 'Proyek berhasil ditambahkan!');
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
    public function destroy(Project $project)
    {
        // Hapus file fisik foto dari storage jika ada
        if ($project->image) {
            Storage::disk('public')->delete($project->image);
        }

        // Hapus data dari database
        $project->delete();

        return redirect()->route('projects.index')->with('success', 'Project dan foto berhasil dihapus!');
    }
}
