<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule as ValidationRule;
use PhpParser\Node\Stmt\If_;

class listingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {

        return view('listings.index', [
            'listings' => Listing::latest()->filter(request(['tags', 'search']))->paginate(6)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('listings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        // dd($request);

        $reqFields = $request->validate([
            'title' => 'required',
            'company' => ['required', ValidationRule::unique('listings', 'company')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required',

        ]);
        // ddd($request->file());

        if ($request->hasFile('logo')) {

            // dd($request);
            $reqFields['logo'] = $request->file('logo')->store('logo', 'public');
        }
        $reqFields['user_id'] = auth()->id();
        Listing::create($reqFields);
        return redirect('/')->with('message', 'successfully created');
    }

    /**
     * Display the specified resource.
     *
     */
    public function show(Listing $listing)
    {
        return view('listings.show', [
            'listing' => $listing
        ]);
    }
    public function manage()
    {
        return view('listings.manage', [
            'listings' => auth()->user()->listings()->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Listing $listing)
    {
        // dd($listing);
        return view('listings.edit', [
            'listing' => $listing
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function update(Request $request,Listing $listing)
    {

        // dd($listing);
        if ($listing->user_id != auth()->id()) {
            abort(403, 'unauthorized action');
        }
        // dd('$listing');

        $reqFields = $request->validate([
            'title' => 'required',
            'company' => ['required'],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required',

        ]);
        // ddd($request->file());

        if ($request->hasFile('logo')) {

            // dd($request);
            $reqFields['logo'] = $request->file('logo')->store('logo', 'public');
        }
        $listing->update($reqFields);
        return redirect('/listings/manage')->with('message', 'successfully updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Listing $listing)
    {
        if ($listing->id != auth()->id()) {
            abort(403, 'Unauthorized action');
        }
        $listing->delete();
        return redirect('/')->with('message', 'successfully deleted');

    }
}
