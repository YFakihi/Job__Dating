<?php
namespace App\Http\Controllers;

use App\Models\Pofile;
use App\Models\Skills;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PofileController extends Controller // Fix the controller class name here
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user(); 
        $skills = Skills::all(); // Get all skills
        $selectedSkills = $user->skills->pluck('id')->toArray()??[]; // Get IDs of user's skills
        $users = User::with('skills')->get();
        return view('learner.profile.index', compact('skills', 'selectedSkills','users'));
    }

    
    public function yourskills()
    {
        $users = User::with('skills')->get();

        return view('profile', compact('users'));
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
    public function show(Pofile $profile) // Fix the model name here
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pofile $profile) // Fix the model name here
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
   
        public function update(Request $request)
        {
            $user = Auth::user();
    
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email',
                'skills' => 'array',
            ]);
    
            $user->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
            ]);
    
            $user->skills()->sync($request->input('skills', []));
            
            return back()->with('success', 'Profile updated successfully');
        }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pofile $profile) // Fix the model name here
    {
        //
    }
}

