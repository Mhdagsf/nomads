@extends('layouts.app')
@section('title', $item->name ?? 'Detail Berita')

@push('prepend-style')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ url('frontend/styles/article-news.css') }}">
@endpush

@section('content')
    <div class="article-page">
        <div class="article-container">

            {{-- ── Artikel Utama ── --}}
            <article>
                {{-- Thumbnail (1 gambar saja) --}}
                <img src="{{ $item->thumbnail ? asset('storage/' . $item->thumbnail) : 'https://images.unsplash.com/photo-1449824913935-59a10b8d2000?w=1200&q=80' }}"
                    alt="{{ $item->name }}" class="article-thumbnail">
                <p class="article-thumbnail-caption">{{ $item->name }}</p>

                {{-- Meta --}}
                <div class="article-meta">
                    @if ($item->author)
                        <span>Oleh {{ $item->author->name }}</span>
                        <span class="dot"></span>
                    @endif
                    <span>{{ $item->created_at->translatedFormat('d F Y') }}</span>
                    @if ($item->category)
                        <span class="dot"></span>
                        <span>Kategori:</span>
                        <span class="article-category-badge">{{ $item->category->name }}</span>
                    @endif
                </div>

                {{-- Judul --}}
                <h1 class="article-title">{{ $item->name }}</h1>

                {{-- Isi Konten --}}
                <div class="article-body">
                    {!! $item->content !!}
                </div>

                {{-- Share --}}
                <div class="share-btn">
                    <button type="button"
                        onclick="navigator.share ? navigator.share({title: '{{ addslashes($item->name) }}', url: window.location.href}) : alert('Link: ' + window.location.href)">
                        Bagikan Artikel Ini
                    </button>
                </div>
            </article>

            {{-- ── Sidebar ── --}}
            <aside class="sidebar">

                {{-- Artikel Terkait --}}
                @if ($related->count() > 0)
                    <div class="sidebar-card">
                        <h3>Artikel Terkait</h3>
                        @foreach ($related as $rel)
                            <a href="{{ route('article-news', $rel->slug) }}" class="related-item">
                                <img src="{{ $rel->thumbnail ? asset('storage/' . $rel->thumbnail) : 'https://images.unsplash.com/photo-1540575861501-7cf05a4b125a?w=400&q=80' }}"
                                    alt="{{ $rel->name }}" class="related-thumb">
                                <span class="related-title">{{ $rel->name }}</span>
                            </a>
                        @endforeach
                    </div>
                @endif

                {{-- Newsletter --}}
                <div class="sidebar-card newsletter-card">
                    <h3>Tetap Terinformasi</h3>
                    <p>Daftar buletin kami untuk mendapatkan berita dan informasi terbaru langsung ke inbox Anda.</p>
                    <form onsubmit="event.preventDefault()">
                        <input type="email" class="newsletter-input" placeholder="Alamat Email Anda">
                        <button type="submit" class="newsletter-btn">Berlangganan</button>
                    </form>
                </div>

            </aside>
        </div>
    </div>
@endsection