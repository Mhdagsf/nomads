@extends('layouts.app')

@section('title')
    NOMADS
@endsection

@section('content')
    <header class="text-center">
        <h1>
            Explore The Beautiful World
            <br />
            As Easy One Click
        </h1>
        <p class="mt-3">
            You will see beautiful
            <br />
            moment you never see before
        </p>
        <a href="#popular" class="btn btn-get-started px-4 mt-4">
            Get Started
        </a>
    </header>
    <main>
        <div class="container">
            <section class="section-stats row justify-content-center" id="stats">
                <div class="col-3 col-md-2 stats-detail">
                    <h2>20K</h2>
                    <p>Members</p>
                </div>
                <div class="col-3 col-md-2 stats-detail">
                    <h2>12</h2>
                    <p>Countries</p>
                </div>
                <div class="col-3 col-md-2 stats-detail">
                    <h2>3K</h2>
                    <p>Hotels</p>
                </div>
                <div class="col-3 col-md-2 stats-detail">
                    <h2>72</h2>
                    <p>Partners</p>
                </div>
            </section>
        </div>
        <section class="section-popular" id="popular">
            <div class="container">
                <div class="row">
                    <div class="col text-center section-popular-heading">
                        <h2>Wisata Popular</h2>
                        <p>
                            Something that you never try
                            <br />
                            before in this world
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-popular-content" id="popularContent">
            <div class="container">
                <div class="section-popular-travel row justify-content-center">
                    @foreach ($items as $item)
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="card-travel text-center d-flex flex-column"
                                style="background-image: url('{{ $item->galleries->count() ? Storage::url($item->galleries->first()->image) : '' }}');">
                                <div class="travel-country">{{ $item->location }}</div>
                                <div class="travel-location">{{ $item->title }}</div>
                                <div class="travel-button mt-auto">
                                    <a href="{{ route('detail', $item->slug) }}" class="btn btn-travel-details px-4">
                                        View Details
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>

        <section class="section-networks" id="networks">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <h2>Our Networks</h2>
                        <p>
                            Companies are trusted us
                            <br />
                            more than just a trip
                        </p>
                    </div>
                    <div class="col-md-8 text-center">
                        <img src="frontend/images/partner.png" class="img-patner" />
                    </div>
                </div>
            </div>
        </section>

        <section class="section-popular" id="popular">
            <div class="container">
                <div class="row">
                    <div class="col text-center section-popular-heading">
                        <h2>Berita Terkini</h2>
                        <p>
                            Informasi eksklusif mengenai destinasi dan kebijakan perjalanan Anda
                        </p>
                    </div>
                </div>
            </div>
        </section>



        <section class="py-16">
            <div class="container mx-auto px-4" style="max-width: 100%;">
                <div class="news-scroll-container">
                    <div class="custom__flex">
                        <!-- News Item 1 -->
                        <div class="news-card" style="flex: 0 0 320px; min-width: 320px;">
                            <div
                                style="position: relative;  overflow: hidden; box-shadow: 0 4px 6px rgba(0,0,0,0.1); cursor: pointer; height: 380px; background-color: #d1d5db;">
                                <img class="news-img"
                                    src="https://images.unsplash.com/photo-1488646953014-85cb44e25828?w=400&h=500&fit=crop"
                                    alt="Berita 1"
                                    style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.3s ease;">
                                <div class="news-overlay"
                                    style="position: absolute; inset: 0; background-color: rgba(0,0,0,0); transition: background-color 0.3s ease; display: flex; align-items: flex-end; padding: 24px;">
                                    <div class="news-text" style="color: white; opacity: 0; transition: opacity 0.3s ease;">
                                        <h3 style="font-size: 18px; font-weight: bold; margin-bottom: 8px;">Destinasi Pantai
                                            Terindah 2026</h3>
                                        <p style="font-size: 14px;">20 Februari 2026</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="news-card" style="flex: 0 0 320px; min-width: 320px;">
                            <div
                                style="position: relative;  overflow: hidden; box-shadow: 0 4px 6px rgba(0,0,0,0.1); cursor: pointer; height: 380px; background-color: #d1d5db;">
                                <img class="news-img"
                                    src="https://images.unsplash.com/photo-1488646953014-85cb44e25828?w=400&h=500&fit=crop"
                                    alt="Berita 1"
                                    style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.3s ease;">
                                <div class="news-overlay"
                                    style="position: absolute; inset: 0; background-color: rgba(0,0,0,0); transition: background-color 0.3s ease; display: flex; align-items: flex-end; padding: 24px;">
                                    <div class="news-text" style="color: white; opacity: 0; transition: opacity 0.3s ease;">
                                        <h3 style="font-size: 18px; font-weight: bold; margin-bottom: 8px;">Destinasi Pantai
                                            Terindah 2026</h3>
                                        <p style="font-size: 14px;">20 Februari 2026</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="news-card" style="flex: 0 0 320px; min-width: 320px;">
                            <div
                                style="position: relative;  overflow: hidden; box-shadow: 0 4px 6px rgba(0,0,0,0.1); cursor: pointer; height: 380px; background-color: #d1d5db;">
                                <img class="news-img"
                                    src="https://images.unsplash.com/photo-1488646953014-85cb44e25828?w=400&h=500&fit=crop"
                                    alt="Berita 1"
                                    style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.3s ease;">
                                <div class="news-overlay"
                                    style="position: absolute; inset: 0; background-color: rgba(0,0,0,0); transition: background-color 0.3s ease; display: flex; align-items: flex-end; padding: 24px;">
                                    <div class="news-text" style="color: white; opacity: 0; transition: opacity 0.3s ease;">
                                        <h3 style="font-size: 18px; font-weight: bold; margin-bottom: 8px;">Destinasi Pantai
                                            Terindah 2026</h3>
                                        <p style="font-size: 14px;">20 Februari 2026</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>




        <section class="section-testimonials-heading" id="testimonialsHeading">
            <div class="container">
                <div class="row">
                    <div class="col text-center">
                        <h2>They Are Loving Us</h2>
                        <p>
                            Moments were giving them
                            <br />
                            the best experience
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-testimonials-content" id="testimonialsContent">
            <div class="container">
                <div class="section-popular-travel row justify-content-center match-height">
                    @foreach ($items as $item)
                        @foreach ($item->testimonials as $testimonial)
                            <div class="col-sm-6 col-md-6 col-lg-4">
                                <div class="card card-testimonial text-center">
                                    <div class="testimonial-content">
                                        <img src="{{ Storage::url($testimonial->image ?? '/path/to/default.png') }}"
                                            class="rounded-circle mb-4" />
                                        <h3 class="mb-4">{{ $testimonial->name }}</h3>
                                        <p class="testimonials">
                                            {{ $testimonial->text }}
                                        </p>
                                    </div>
                                    <hr />
                                    <p class="trip-to mt-2">{{ $item->title ?? 'Data Terhapus' }}</p>
                                </div>
                            </div>
                        @endforeach
                    @endforeach

                </div>
                <div class="row">
                    <div class="col-12 text-center">
                        <a href="#" class="btn btn-need-help px-4 mt-4 mx-1">
                            I Need Help
                        </a>
                        <a href="{{ route('register') }}" class="btn btn-get-started px-4 mt-4 mx-1">
                            Get Started
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
