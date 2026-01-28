<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\ProfileRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        // mengambil data user yang sedang login
        $user = Auth::user();
        return view('pages.admin.profile', compact('user'));
    }
    /**
     * Update the user profile.
     *
     * @param \App\Http\Requests\Admin\ProfileRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProfileRequest $request)
    {
        // Data otomatis tervalidasi sebelum masuk ke sini
        $data = $request->validated();
        $user = auth()->user();

        if ($request->hasFile('avatar')) {
            // Hapus foto lama jika ada agar tidak memenuhi penyimpanan server
            if ($user->avatar) {
                Storage::delete('public/' . $user->avatar);
            }

            // Simpan foto baru
            $data['avatar'] = $request->file('avatar')->store('assets/avatar', 'public');
        }

        $user->update($data);

        return redirect()->route('profile')->with('success', 'Profile updated successfully.');
    }
}
