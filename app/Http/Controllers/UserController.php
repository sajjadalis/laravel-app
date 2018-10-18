<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\User;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['profile']]);
    }
    public function profile($id, $slug = "")
    {
        $user = User::find($id);
        if($slug !== $user->slug){
            return redirect()->to($user->url);
        }

        return view('users.profile')->with('user', $user);
    }

    public function profile_edit($id)
    {
        $user = User::find($id);
        if (auth()->user()->id !== $user->id) {
            return redirect($user->url)->with('error', 'Unauthorized Page');
        }

        return view('users.profile_edit')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function profile_update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:200',
            'phone_number' => 'numeric|nullable',
            'picture' => 'image|nullable|max:1999',
            'cover_image' => 'image|nullable|max:1999',
            'occupation' => 'string|nullable',
            'about' => 'string|nullable',
            'city' => 'string|nullable',
            'city' => 'string|nullable',
            'gender' => 'string|nullable',
            'website' => 'url|nullable',
            'twitter' => 'string|nullable',
            'facebook' => 'string|nullable',
            'google_plus' => 'string|nullable',
            'linkedin' => 'string|nullable',
        ]);

        // if(!is_null($user) {
        //     return redirect('/')->with('error', "User doesn't exist");   
        //  }
         $user = User::find($id);
        // Handle Featured Image Upload
        if($request->hasFile('picture')){
            $pictureWithExt = $request->file('picture')->getClientOriginalName();
            $picture_filename = pathinfo($pictureWithExt, PATHINFO_FILENAME);
            $picture_extension = $request->file('picture')->getClientOriginalExtension();
            $pictureNameToStore = $picture_filename.'_'.time().'.'.$picture_extension;
            $picture_path = $request->file('picture')->storeAs('public/profile', $pictureNameToStore);
        }
        if($request->hasFile('cover_image')){
            $coverWithExt = $request->file('cover_image')->getClientOriginalName();
            $cover_filename = pathinfo($coverWithExt, PATHINFO_FILENAME);
            $cover_extension = $request->file('cover_image')->getClientOriginalExtension();
            $coverNameToStore = $cover_filename.'_'.time().'.'.$cover_extension;
            $cover_path = $request->file('cover_image')->storeAs('public/profile', $coverNameToStore);
        }

        $user->name = $request->input('name');
        $user->occupation = $request->input('occupation');
        $user->phone_number = $request->input('phone_number');
        $user->gender = $request->input('gender');
        $user->city = $request->input('city');
        $user->country = $request->input('country');
        $user->about = $request->input('about');
        $user->website = $request->input('website');
        $user->twitter = $request->input('twitter');
        $user->facebook = $request->input('facebook');
        $user->google_plus = $request->input('google_plus');
        $user->linkedin = $request->input('linkedin');

        if($request->hasFile('picture')){
            $user->picture = $pictureNameToStore;
        }

        if($request->hasFile('cover_image')){
            $user->cover_image = $coverNameToStore;
        }

        $user->save();

        return redirect($user->url)->with('success', "Profile Updated");
    }
}
