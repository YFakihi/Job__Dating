<?php

namespace App\Http\Controllers;

use App\Http\Requests\PartnerRaquest;
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


    public function archive()
    {
        $partners = Partner::onlyTrashed()->get();

        return view('admin.partners.index',compact('partners'));
    }

    public function all()
    {
        $partners = Partner::withTrashed()->get();

        return view('admin.partners.index',compact('partners'));
    }


    
  // public function archive()
    // {
    //     $partners = Partner::onlyTrashed()->get(); // Use get() to retrieve all soft-deleted records
    //     // Or use $partners = Partner::onlyTrashed()->first(); // if you expect only one soft-deleted recor
    //     return view('admin.partners.index', compact('partners'));
    // }


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
    public function store(PartnerRaquest $request)
    {
        $request->validated();

        Partner::create($request->all());

        return redirect()->route('partners.index')->with('success', 'Partner created successfully.');
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
    public function update(PartnerRaquest $request, Partner $partner)
{
    $request->validated();

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
