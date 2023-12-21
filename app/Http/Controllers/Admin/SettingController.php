<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $setting = Setting::first();
        if ($setting === null) {
            $setting = new Setting();
            $setting->title = 'Project Title';
            $setting->save();
            $setting = Setting::first();

        }
        return view("admin.settings.index", [
            'setting' => $setting
        ]);
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
        //
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
    public function edit()
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $data = Setting::find($id);

            $data->title = $request->input('title');
            $data->keywords = $request->input('keywords');
            $data->description = $request->input('description');
            $data->company_name = $request->input('company_name');
            $data->phone = $request->input('phone');
            $data->email = $request->input('email');

            $data->smtp_server = $request->input('smtp_server');
            $data->smtp_username = $request->input('smtp_username');
            $data->smtp_password = $request->input('smtp_password');
            $data->smtp_port = $request->input('smtp_port');

            $data->facebook_url = $request->input('facebook_url');
            $data->twitter_url = $request->input('twitter_url');
            $data->instagram_url = $request->input('instagram_url');
            $data->linkedin_url = $request->input('linkedin_url');

            $data->about_us = $request->input('about_us');
            $data->contact_info = $request->input('contact_info');
            $data->currency = $request->input('currency');

            // Update the logo if a new one is provided
            if ($request->hasFile('logo')) {
                $logoPath = $request->file('logo')->store('images');
                $data->logo = $logoPath;
            }

            $data->status = $request->input('status');
            $data->save();

            return redirect()->route('admin.setting.index')->with('success', 'Settings updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error updating settings. ' . $e->getMessage())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function storeHome(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'keywords' => 'nullable|string',
            'description' => 'nullable|string',
            'company_name' => 'nullable|string',
            'email' => 'nullable|email',
            'phone' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Handle file upload if logo is present
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('logos', 'public');
        }

        // Create or update record in the database
        Setting::updateOrCreate(
            ['id' => $request->input('setting_id')], // assuming you have a hidden input with setting_id
            [
                'title' => $request->input('title'),
                'keywords' => $request->input('keywords'),
                'description' => $request->input('description'),
                'company_name' => $request->input('company_name'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'logo' => $logoPath ?? null,
            ]
        );

        // Redirect or return response as needed
        return redirect()->route('admin.setting.index')->with('success', 'Home settings saved successfully.');
    }

    public function storeSM(Request $request)
    {
        $request->validate([
            'facebook_url' => 'nullable|url',
            'twitter_url' => 'nullable|url',
            'instagram_url' => 'nullable|url',
            'linkedin_url' => 'nullable|url',
        ]);

        // Create or update record in the database
        Setting::updateOrCreate(
            ['id' => $request->input('setting_id')], // assuming you have a hidden input with setting_id
            [
                'facebook_url' => $request->input('facebook_url'),
                'twitter_url' => $request->input('twitter_url'),
                'instagram_url' => $request->input('instagram_url'),
                'linkedin_url' => $request->input('linkedin_url'),
            ]
        );

        // Redirect or return response as needed
        return redirect()->route('admin.setting.index')->with('success', 'S-M settings saved successfully.');
    }

    public function storeMessages(Request $request)
    {
        try {
            // Create or update record in the database
            Setting::updateOrCreate(
                ['id' => $request->input('setting_id')], // assuming you have a hidden input with setting_id
                [
                    'currency' => $request->input('currency'),
                    'about_us' => $request->input('about_us'),
                    'contact_info' => $request->input('contact_info'),
                    'status' => $request->input('status'),
                ]
            );

            return redirect()->route('admin.setting.index')->with('success', 'Email settings saved successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error saving email settings. ' . $e->getMessage())->withInput();
        }
    }

    public function storeEmailSettings(Request $request)
    {
        $request->validate([
            'smtp_server' => 'nullable|string',
            'smtp_username' => 'nullable|string',
            'smtp_password' => 'nullable|string',
            'smtp_port' => 'nullable|integer',
        ]);

        // Create or update record in the database
        Setting::updateOrCreate(
            ['id' => $request->input('setting_id')], // assuming you have a hidden input with setting_id
            [
                'smtp_server' => $request->input('smtp_server'),
                'smtp_username' => $request->input('smtp_username'),
                'smtp_password' => $request->input('smtp_password'),
                'smtp_port' => $request->input('smtp_port'),
            ]
        );

        // Redirect or return response as needed
        return redirect()->route('admin.setting.index')->with('success', 'Email settings saved successfully.');
    }
}
