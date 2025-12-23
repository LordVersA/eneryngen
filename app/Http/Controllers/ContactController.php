<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'message' => 'required|string',
            'agreement' => 'required|accepted',
        ]);

        \App\Models\Contact::create([
            'name' => $validated['name'],
            'message' => $validated['message'],
            'agreement' => true,
            'is_read' => false,
        ]);

        return back()->with('success', 'Thank you for your message! We will get back to you soon.');
    }
}
