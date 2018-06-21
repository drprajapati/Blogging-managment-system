<?php

namespace App\Http\Controllers;
use Session;
use App\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index(){
        return view('admin.setting.create')->with('setting',Setting::first());
    }
    public function update(Request $request){
        $settings = Setting::first();
        $this->validate($request, [
            'contact_email'=>'required|email',
            'contact_number'=>'required',
            'address'=>'required',
            'site_name'=>'required'
        ]);
        $settings->contact_email = $request->contact_email;
        $settings->contact_number = $request->contact_number;
        $settings->site_name = $request->site_name;
        $settings->address = $request->address;

        $settings->save();
        Session::flash('success','Site setting is successfully updated');
        return redirect()->back();
    }
}
