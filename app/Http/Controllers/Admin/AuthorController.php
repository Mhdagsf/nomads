<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AuthorRequest;
use App\Models\Author;
use App\Models\ArticleNews;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Author::all();

        return view('pages.admin.author.index', [
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $items = Author::all();
        return view('pages.admin.author.create', [
            'items' => $items
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AuthorRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);

        $data['avatar'] = $request->file('avatar')->store(
            'assets/author',
            'public'
        );

        Author::create($data);
        return redirect()->route('author.index');
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
        $item = Author::findOrFail($id); // Langsung cari kategorinya

        return view('pages.admin.author.edit', [
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AuthorRequest $request, string $id)
    {
        $item = Author::findOrFail($id);
        $data = $request->all();

        $data['slug'] = Str::slug($request->name);

        // Handle image upload - optional
        if ($request->hasFile('avatar')) {
            // Delete old avatar if exists
            if ($item->avatar && Storage::exists('public/' . $item->avatar)) {
                Storage::delete('public/' . $item->avatar);
            }
            // Store new image
            $data['avatar'] = $request->file('avatar')->store(
                'assets/author',
                'public'
            );
        } else {
            // Keep old avatar if no new file uploaded
            $data['avatar'] = $item->avatar;
        }


        $item->update($data);
        return redirect()->route('author.index')->with('success', 'Author updated successfully!');;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Author::findOrFail($id);
        $item->delete();

        return redirect()->route('author.index');
    }
}
