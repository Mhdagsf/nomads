<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ArticleNewsRequest;
use App\Models\ArticleNews;
use App\Models\Category;
use App\Models\Author;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;


class ArticleNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = ArticleNews::with(['category', 'author'])->get();

        return view('pages.admin.article-news.index', [
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $items = ArticleNews::with(['category', 'author'])->latest()->get();
        $categories = Category::all();
        $authors = Author::all();
        return view('pages.admin.article-news.create', compact(
            'items',
            'categories',
            'authors'
        ));
    }
    public function upload(Request $request)
    {
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;

            // Pastikan folder ada
            $uploadPath = public_path('assets/editor-images');
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }

            // Simpan ke folder public/assets/editor-images
            $request->file('upload')->move($uploadPath, $fileName);

            $url = asset('assets/editor-images/' . $fileName);

            return response()->json([
                'urls' => [
                    'default' => $url
                ]
            ]);
        }

        return response()->json([
            'error' => [
                'message' => 'No file uploaded.'
            ]
        ], 400);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticleNewsRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);

        $data['thumbnail'] = $request->file('thumbnail')->store(
            'assets/article-news',
            'public'
        );

        ArticleNews::create($data);
        return redirect()->route('article-news.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $item = ArticleNews::with(['category', 'author'])->where('slug', $slug)->firstOrFail();

        // 1. Ambil artikel dari kategori yang sama (paling relevan)
        $related = ArticleNews::with(['category', 'author'])
            ->where('id', '!=', $item->id)
            ->where('category_id', $item->category_id)
            ->latest()
            ->take(3)
            ->get();

        // 2. Jika kurang dari 3, lengkapi dengan artikel terbaru lainnya
        if ($related->count() < 3) {
            $existingIds = $related->pluck('id')->push($item->id);
            $fillCount = 3 - $related->count();

            $fallback = ArticleNews::with(['category', 'author'])
                ->whereNotIn('id', $existingIds)
                ->latest()
                ->take($fillCount)
                ->get();

            $related = $related->concat($fallback);
        }

        return view('pages.article-news.show', compact('item', 'related'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = ArticleNews::findOrFail($id);
        $categories = Category::all();
        $authors = Author::all();

        return view('pages.admin.article-news.edit', [
            'item' => $item,
            'categories' => $categories,
            'authors' => $authors,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ArticleNewsRequest $request, string $id)
    {
        $data = $request->all();
        $item = ArticleNews::findOrFail($id);
        $data['slug'] = Str::slug($request->name);
        if ($request->hasFile('thumbnail')) {
            // Hapus gambar lama jika ada
            if ($item->thumbnail && Storage::exists('public/' . $item->thumbnail)) {
                Storage::delete('public/' . $item->thumbnail);
            }
            // Simpan gambar baru
            $data['thumbnail'] = $request->file('thumbnail')->store(
                'assets/article-news',
                'public'
            );
        } else {
            // Pertahankan gambar lama jika tidak ada file baru
            $data['thumbnail'] = $item->thumbnail;
        }


        $item->update($data);
        return redirect()->route('article-news.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = ArticleNews::findOrFail($id);
        $item->delete();

        return redirect()->route('article-news.index');
    }
}
