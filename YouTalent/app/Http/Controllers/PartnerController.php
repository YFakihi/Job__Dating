<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $partners = Partner::latest()->paginate(5);
        return view('admin.partners.index',compact('partners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.partners.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|min:10|max:255',
            'description'=>'required|string',
            'industry'=>'required|string',
            'size'=>'required|in:small,medium,large',
            'location'=>'required|string',
        ]);
        
        Partner::create($request->all());
        // Partner::create($request->validated());
        return redirect()->back()->with('success','Book created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Partner $partner)
    {
        return view('admin.partners.show', compact('partner'));
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Partner $partner)
    {
        return view('admin.partners.edit', compact('partner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Partner $partner)
{
    $request->validate([
        'name' => 'required|min:10|max:255',
        'description' => 'required|string',
        'industry' => 'required|string',
        'size' => 'required|string',
        'location' => 'required|string',
    ]);

    $partner->update($request->all());

    return redirect()->back()->with('success', 'Partner updated successfully.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Partner $partner)
    {
        $partner->delete();
         
        return redirect()->back()->with('success','partner deleted successfully');
    }
}
