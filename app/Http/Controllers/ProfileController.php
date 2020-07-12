<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ProfileController extends Controller
{
    /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit')->with('user',$user);
    }

    /**
     * Update the profile
     *
     * @param  \App\Http\Requests\ProfileRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */

 public function update(Request $request)
        {
            $user = Auth::user();
    
    
            if($request->hasFile('image')){
                $image = $request->image;
                $image_new_name=time().$image->getClientOriginalName();
                $image->move('uploads/pros/',$image_new_name);
                $user->profile->image='/uploads/pros/'.$image_new_name;
                $user->profile->save();
            }
            if($request->hasFile('back_image')){
                $image = $request->back_image;
                $image_new_name=time().$image->getClientOriginalName();
                $image->move('uploads/pros/',$image_new_name);
                $user->profile->back_image='/uploads/pros/'.$image_new_name;
                $user->profile->save();
            }
            
            $user->name = $request->name;
            $user->email = $request->email;
            $profile = $user->profile;
            $profile->about = $request->about;
            $profile->birthdate = $request->birthdate;
            $profile->birthplace = $request->birthplace;
            $profile->job = $request->job;
            $profile->university = $request->university;
            
            $user->save();
            $profile->save();
            
        return back()->withSuccess(__('Profile successfully updated.'));
    }

    /**
     * Change the password
     *
     * @param  \App\Http\Requests\PasswordRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function password(Request $request)
    {
        $user = Auth::user();

        if ( $request->password == $request->password_confirmation ){
            $user->password = bcrypt($request->password);
            return redirect()->back()->with('success','Password successfully updated.');
        }else{
        return redirect()->back()->with('success','ReEnter your new pass.');
    }
    }
}
