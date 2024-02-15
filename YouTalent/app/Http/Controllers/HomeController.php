<?php

namespace App\Http\Controllers;

use App\Models\Advert;
use App\Models\Partner;
use App\Models\Skills;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index()
    // {     $adverts = advert::latest()->paginate(3);
       
    //     return view('welcome',compact('adverts'));
    // }

    
    public function index()
    {
        $userSkills = auth()->user()->skills;
    
        $adverts = Advert::whereHas('skills', function ($query) use ($userSkills) {
            $query->whereIn('id', $userSkills->pluck('id'));
        })->latest()->with('Partner', 'Skills')->paginate(8);
    
        $Partner = Partner::all();
        $Skills = Skills::all();
    
   
        // $advertCount = DB::select('SELECT COUNT(*) FROM adverts a INNER JOIN user_advert ud ON a.id = ud.advert_id INNER JOIN users u ON ud.user_id = u.id');
        // // dd($advertCount[0]);
        // $count = $advertCount[0]->count;
    
        return view('welcome', compact('adverts', 'Partner', 'Skills'));
    }
    

 
}



// public function index()
// {
//     // Check if there is an authenticated user
//     $user = auth()->user();
    
//     if ($user) {
//         // If user exists, retrieve user skills
//         $userSkills = $user->skills;

//         // Retrieve adverts that have skills matching the user's skills
//         $adverts = Advert::whereHas('skills', function ($query) use ($userSkills) {
//             $query->whereIn('id', $userSkills->pluck('id'));
//         })->latest()->with('Partner', 'Skills')->paginate(8);

//         // Retrieve all partners and skills (not directly related to the previous query)
//         $partners = Partner::all();
//         $skills = Skills::all();

//         // Return the view 'welcome' with the data
//         return view('welcome', compact('adverts', 'partners', 'skills'))
//             ->with('i', (request()->input('page', 1) - 1) * 8);
//     } else {
//         // If there is no authenticated user, you may want to redirect or handle it differently
//         return redirect()->route('login')->with('error', 'Please log in to view this page.');
//     }