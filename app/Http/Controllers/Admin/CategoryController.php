<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Models\Category;
use App\Models\ArticleNews;
use Illuminate\Support\Str;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Category::with(['articles'])->get();

        return view('pages.admin.category.index', [
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $articles = ArticleNews::all();
        return view('pages.admin.category.create', [
            'articles' => $articles
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $data = $request->all();

        // Otomatis membuat slug dari field 'name'
        $data['slug'] = Str::slug($request->name);

        Category::create($data);

        return redirect()->route('category.index');
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
        $item = Category::findOrFail($id); // Langsung cari kategorinya

        return view('pages.admin.category.edit', [
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, string $id)
    {
        $data = $request->all();

        $data['slug'] = Str::slug($request->name);

        $item = Category::findOrFail($id);
        $item->update($data);
        return redirect()->route('category.index')->with('success', 'Category updated successfully!');;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Category::findOrFail($id);
        $item->delete();

        return redirect()->route('category.index');
    }
}
