<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TestimonialRequest;
use App\Http\Requests\Admin\TestimonialRequestRequest;
use App\Models\Testimonial;
use App\Models\TravelPackage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Testimonial::with(['travel_package'])->get();

        return view('pages.admin.testimonial.index', [
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $travel_packages = TravelPackage::all();

        return view('pages.admin.testimonial.create', [
            'travel_packages' => $travel_packages
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TestimonialRequest $request)
    {
        $data = $request->all();

        // Handle image upload
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store(
                'assets/testimonial',
                'public'
            );
        }

        Testimonial::create($data);
        return redirect()->route('testimonial.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = Testimonial::findOrFail($id);
        $travel_packages = TravelPackage::all();

        return view('pages.admin.testimonial.edit', [
            'item' => $item,
            'travel_packages' => $travel_packages
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TestimonialRequest $request, string $id)
    {
        $item = Testimonial::findOrFail($id);
        $data = $request->all();

        // Handle image upload - optional
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($item->image && Storage::exists('public/' . $item->image)) {
                Storage::delete('public/' . $item->image);
            }
            // Store new image
            $data['image'] = $request->file('image')->store(
                'assets/testimonial',
                'public'
            );
        } else {
            // Keep old image if no new file uploaded
            $data['image'] = $item->image;
        }

        $item->update($data);
        return redirect()->route('testimonial.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
