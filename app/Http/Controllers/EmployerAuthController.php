<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmployerAuthController extends Controller
{
    // Show Registration Form
    public function showRegisterForm()
    {
        return view('employer_register');
    }

    // Handle Registration
    public function register(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'company_name' => 'required|string|max:255',
            'email' => 'required|email|unique:employers,email',
            'password' => 'required|string|confirmed|min:8',
            'username' => 'required|string|max:255',
            'contact_phone' => 'nullable|string|max:15',
            'contact_address' => 'nullable|string|max:255',
            'about_us' => 'nullable|string',
            'social_links' => 'nullable|array',
            'website' => 'nullable|string'
        ]);



        // Prepare optional fields like social links
        $socialLinks = json_encode($request->input('social_links', []));

        // Create a new employer record
        Employer::create([
            'company_name' => $validated['company_name'],
            'username' => $validated['username'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'contact_phone' => $request->input('contact_phone'),
            'contact_address' => $request->input('contact_address'),
            'about_us' => $request->input('about_us'),
            'social_links' => $socialLinks,
            'website' => $request->input('website')

        ]);

        return redirect()->route('employer.login')->with('success', 'Registration successful!');
    }

}
