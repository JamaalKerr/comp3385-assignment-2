<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        // Handle form submission logic here
        // For example, validate and process the form data
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'feedback' => 'required'
        ]);

        // You can save the data to the database or send an email

        return redirect('/feedback')->with('success', 'Feedback submitted successfully!');
    }
}
