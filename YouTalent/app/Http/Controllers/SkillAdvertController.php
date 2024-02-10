<?php

namespace App\Http\Controllers;

use App\Models\skill_advert;
use App\Models\Skills;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SkillAdvertController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $user = Auth::user(); 
        // $skills = Skills::all(); // Get all skills
        // $selectedSkills = $user->skills->pluck('id')->toArray()??[]; // Get IDs of user's skills
        // $users = User::with('skills')->get();
        // return view('learner.profile.index', compact('skills', 'selectedSkills','users'));
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
    public function show(skill_advert $skill_advert)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(skill_advert $skill_advert)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, skill_advert $skill_advert)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(skill_advert $skill_advert)
    {
        //
    }
}
