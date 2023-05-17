<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;


class SettingsController extends Controller
{
    function index(Setting $setting)
    {
        $this->authorize('viewAny', $setting);
        return view('setting.settings');
        // return view('table');
    }
    function update(Request $request, Setting $setting)
    {
        $this->authorize('update', $setting);
        $data = [
            'logo' => 'nullable|image|mimes:png,jpg,jpeg,gif,svg',
            'favicon' => 'nullable|image|mimes:png,jpg,jpeg,gif,svg',
            'facebook' => 'nullable|string',
            'phone' => 'nullable|numeric',
            'instagram' => 'nullable|string',
            'email' => 'nullable|string|email',
        ];
        foreach (config('app.languages') as $key => $lang) {
            $data[$key . '*.title'] =  'nullable | string';
            $data[$key . '*.content'] =  'nullable | string';
            $data[$key . '*.address'] =  'nullable | string';
        }

        $request->validate($data);

        unlink($setting->logo);
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo')->getClientOriginalName();
            //if the folder images or logo not exists it will create it automatically
            $request->logo->move(public_path('\images\logo\\'), $logo);

            $path1 = 'images\logo\\';
            $setting->update(['logo' =>  $path1 . $logo]);
        }

        unlink($setting->favicon);
        if ($request->hasFile('favicon')) {
            $favicon = $request->file('favicon')->getClientOriginalName();
            // if the folder images or favicon not exists it will create it automatically          
            $request->favicon->move(public_path('images\favicon'), $favicon);

            $path2 = 'images\favicon\\';
            $setting->update(['favicon' => $path2 . $favicon]);
        }

        //i will update all requests except 'logo', 'favicon' because i will updated before
        $setting->update($request->except('logo', 'favicon', '_token'));

        return redirect()->back();
    }
}