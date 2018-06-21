<?php

namespace App\Http\Controllers;

use Session;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.user.profile')->with('user',Auth::user());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.user.edit')->with('user',User::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|email',
            'facebook'=>'required|url',
            'youtube'=>'required|url',

        ]);
        $user = Auth::user();
        if($request->hasFile('avatar')){
            $avatar = $request->avatar;
            $avatar_new_name = time().$avatar.getClientOriginalName();
            $avatar->move('uploads/avatars',$avatar_new_name);
            $user->profile->avatar = 'uploads/avatar/'.$avatar_new_name;
            $user->profile->save();
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->profile->facebook = $request->facebook;
        $user->profile->youtube = $request->youtube;
        $user->profile->about = $request->about;

        if($request->has('password')){
            $user->password = $request->password;
        }

        $user->save();
        Session::flash('success','User profile is update');
        return redirect()->route('user.profile');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
