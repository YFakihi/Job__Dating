<?php

namespace App\Http\Controllers;
use App\Models\Partner;
use App\Models\advert;
use Illuminate\Http\Request;

class advertController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $adverts = advert::latest()->paginate(5);
        // $partner=Partner::all();
        return view('admin.adverts.index',compact('adverts'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $partners = Partner::all(); // Assuming Partner is the model for your partners table
        return view('admin.adverts.create', compact('partners','partners'));   
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required|min:10|max:255',
            'content'=>'required|string',
    
            
        ]);
        
        advert::create($request->all());
        // advert::create($request->validated());
        return redirect()->back()->with('success','Book created successfully.');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(advert $advert)
    {
        return view('admin.adverts.show', compact('advert'));
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(advert $advert)
    {
        $partners = Partner::all(); 
        return view('admin.adverts.edit', compact('advert','partners'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, advert $advert)
{
    $request->validate([
        'title' => 'required|min:10|max:255',
        'content' => 'required|string',
        
    ]);

    $advert->update($request->all());

    return redirect()->back()->with('success', 'advert updated successfully.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(advert $advert)
    {
        $advert->delete();
         
        return redirect()->back()->with('success','advert deleted successfully');
    }
}
