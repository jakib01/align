<?php

namespace App\Http\Controllers; // Ensure the correct namespace

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Candidate;

class CandidateAuthController extends Controller
{
    // Show registration form
    public function showRegistrationForm()
    {
        return view('candidate.candidate_register');
    }

    public function loginAssesment()
    {
        return view('candidate.login_assesment');
    }

    // Handle registration request
    public function register(Request $request)
    {
        // Validate the input data
        $request->validate([
            'candidate_name' => 'required|string|max:255',
            'email' => 'required|email|unique:candidates,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // Create a new candidate
        $candidate = new Candidate();
        $candidate->candidate_name = $request->candidate_name;
        $candidate->email = $request->email;
        $candidate->password = bcrypt($request->password);
        $candidate->save();

        // Redirect to login page with a success message
        return redirect()->route('candidate_login_form')->with('success', 'Registration successful! Please login.');
        
        // return redirect()->route('candidate_login_assesment');

        // return view('candidate.login_assesment');

    }


}
