<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;

use App\User;

class ProfileController extends Controller
{
    // Index View
    public function index($slug) {
        $user = User::where('slug', $slug)->first();

        return view('profiles.profile')
            ->with('user', $user);
    }

    // Edit
    public function edit() {
        return view('profiles.edit')->with('info', Auth::user()->profile);
    }

    // Update
    public function update(Request $request) {
        //dd($request->all());

        $this->validate($request, [
            'location' => 'required',
            'about' => 'required|max:255',
        ]);

        Auth::user()->profile()->update([
            'location' => $request->location,
            'about' => $request->about,
        ]);

        if($request->hasFile('avatar')) {
            Auth::user()->update([
                'avatar' => $request->avatar->store('public/avatars')
            ]);
        }

        //dd(Auth::user()->profile);
        Session::flash('success', 'Profile updated');
        return redirect()->back();
    }
}
