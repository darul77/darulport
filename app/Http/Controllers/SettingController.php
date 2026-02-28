<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function edit()
    {
        // Mengambil semua setting dan mengubahnya menjadi array agar mudah dipanggil
        $settings = \App\Models\Setting::pluck('value', 'key');
        return view('settings.edit', compact('settings'));
    }

    public function update(Request $request)
    {
        foreach ($request->except('_token') as $key => $value) {
            \App\Models\Setting::where('key', $key)->update(['value' => $value]);
        }
        return redirect()->back()->with('success', 'Pengaturan berhasil diperbarui!');
    }
}
