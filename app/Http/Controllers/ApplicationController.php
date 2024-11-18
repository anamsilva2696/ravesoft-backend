<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $applications = Application::paginate(10);
        return view('applications.index', compact('applications'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('applications.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    
    public function store(Request $request)
    {
        // Validate form inputs
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|regex:/^[0-9]{9}$/',
            'area' => 'required|in:development,marketing,design,other',
            'message' => 'required|string|max:1000',
        ], [
            'name.required' => 'The name field is required.',
            'email.required' => 'The email field is required.',
            'email.email' => 'Please provide a valid email address.',
            'phone.required' => 'The phone number field is required.',
            'phone.regex' => 'The phone number must be 9 digits.',
            'area.required' => 'Please select an area of interest.',
            'message.required' => 'Please message field is required.',
        ]);

        
       
        $userId = Auth::id();
        $validatedData['user_id'] = $userId; // Get the logged-in user's ID

        Application::create($validatedData);

        return redirect()->route('applications.index')
        ->with('success', 'Application submitted successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $application = Application::findOrFail($id);

        // Pass the candidatura to the view
        return view('applications.show', compact('application'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $applications = Application::findOrFail($id);
        return view('applications.edit', compact('applications'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|regex:/^[0-9]{9}$/',
            'area' => 'required|in:development,marketing,design,other',
            'message' => 'required|string|max:1000',
        ], [
            'name.required' => 'The name field is required.',
            'email.required' => 'The email field is required.',
            'email.email' => 'Please provide a valid email address.',
            'phone.required' => 'The phone number field is required.',
            'phone.regex' => 'The phone number must be 9 digits.',
            'area.required' => 'Please select an area of interest.',
            'message.required' => 'Please message field is required.',
        ]);
    
        $candidatura = Application::findOrFail($id);
        $candidatura->update($validatedData);
    
        return redirect()->route('applications.index')
        ->with('success', 'Application updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $candidatura = Application::findOrFail($id);
        $candidatura->delete();

        return redirect()->route('applications.index')
        ->with('success', 'Application deleted successfully!');
    }

    /*Api methods*/

    public function getApplicationsByUser(Request $request)
    {
        // Validate user_id
        $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);

        // Fetch applications for the user
        $applications = Application::where('user_id', $request->user_id)->get();

        return response()->json([
            'applications' => $applications,
        ], 200);
    }

    public function saveApplication(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'area' => 'required|string',
            'message' => 'required|string',
            'user_id' => 'required|integer|exists:users,id',
        ]);

        $application = Application::create($validated);

        return response()->json(['message' => 'Application saved successfully!', 'application' => $application], 201);
    }
}
