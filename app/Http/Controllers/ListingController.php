<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    // Show all listings
    public function index()
    {
        return view('listings.index', ['listings' => Listing::latest()->filter(request(["tag", 'search']))->paginate(6)]);
    }

    // Show single listing
    public function show(Listing $listing)
    {
        return view('listings.show', ['listing' => $listing]);
    }

    // Show create form
    public function create()
    {
        return view('listings.create');
    }

    // Store listing data
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            'website' => 'required',
            'email' => 'required|email',
            'description' => 'required',
            'tags' => 'required',
        ]);
        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }
        $formFields['user_id'] = auth()->id();
        // dd($formFields);
        Listing::create($formFields);
        return redirect('/')->with('message', 'Listing Created!');
    }

    // Show edit form
    public function edit(Listing $listing)
    {
        // dd($listing->description);
        return view('listings.edit', ['listing' => $listing]);
    }

    // Update listing data
    public function update(Request $request, Listing $listing)
    {
        // Make sure logged in user is the owner of the listing
        if (auth()->id() !== $listing->user_id) {
            return back()->with('message', 'You are not authorized to edit this listing!');
        }

        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required'],
            'location' => 'required',
            'website' => 'required',
            'email' => 'required|email',
            'description' => 'required',
            'tags' => 'required',
        ]);
        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }
        $listing->update($formFields);
        return back()->with('message', 'Listing Updated!');
    }

    // Delete listing
    public function destroy(Listing $listing)
    {
        // Make sure logged in user is the owner of the listing
        if (auth()->id() !== $listing->user_id) {
            return back()->with('message', 'You are not authorized to delete this listing!');
        }
        $listing->delete();
        return redirect('/')->with('message', 'Listing Deleted!');
    }

    // Manage Listings
    public function manage()
    {
        return view('listings.manage', ['listings' => auth()->user()->listings]);
    }
}
