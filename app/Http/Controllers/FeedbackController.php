<?php

namespace App\Http\Controllers;

use App\Mail\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FeedbackController extends Controller
{
    // Method to display the feedback form
    public function create()
    {
        return view('feedback-form');
    }

    // Method to handle form submission
    public function send(Request $request)
    {
        // Validate form input
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'feedback' => 'required'
        ]);

        // Send email
        Mail::to('comp3385@uwi.edu')->send(new Feedback($validated['name'], $validated['email'], $validated['feedback']));

        // Redirect back with success message
        return redirect('/feedback/success')->with('success', 'Feedback submitted successfully!');
    }

    // Method to display the success message
    public function success()
    {
        return view('feedback-success');
    }
}
