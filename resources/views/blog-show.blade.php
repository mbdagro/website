@extends('layouts.FontEndApps')
@section('title')<title>{{ $blog->title }}</title>@endsection
@section('content')
<div class="page-title page-main-section parallaxie" style="margin-top: -8px">
    <div class="container padding-bottom-top-120 text-uppercase text-center">
        <div class="main-title">
            <h1>Gallery</h1>
            @php
            use Carbon\Carbon;
              $yearsSinceStart = isset($HomeManagement->start_date)
            ? round(Carbon::parse($HomeManagement->start_date)->floatDiffInYears(now()), 0)
            : 0;
            @endphp
            <h5>{{ $yearsSinceStart }} Years Of Experience!</h5>
            <div class="line_4"></div>
            <div class="line_5"></div>
            <div class="line_6"></div>
            <a href="{{ route('home') }}">home</a><span><i class="fa fa-angle-double-right"
                    aria-hidden="true"></i></span>
            <a href="gallery-3.html">Gallery</a>
        </div>
    </div>
</div>
<section style="background:#fff; padding:60px 0;" id="blog-section">
    <div class="container">
        <h2 class="text-center fw-bold mb-5">Blog Details</h2>

        <div class="row" style="align-items: flex-start;">

            {{-- ── LEFT: Blog Content ───────────── --}}
            <div class="col-md-8">

                {{-- Main Image --}}
                @php
                $disk = config('filesystems.voucher_disk', 'public');
                $imgUrl = $blog->image ? \Storage::disk($disk)->url($blog->image) : asset('images/default-blog.jpg');
                @endphp
                <img src="{{ $imgUrl }}" alt="{{ $blog->title }}"
                    style="width:100%; border-radius:8px; max-height:420px; object-fit:cover;">

                {{-- Date --}}
                <p style="font-size:13px; color:#666; margin-top:16px; margin-bottom:8px;">
                    <i class="fa fa-calendar"></i>
                    {{ \Carbon\Carbon::parse($blog->created_at)->format('d M Y') }}
                </p>

                {{-- Title --}}
                <h3 style="font-weight:700; font-size:20px; color:#111; margin-bottom:16px;">
                    {{ $blog->title }}
                </h3>

                {{-- Full Description --}}
                <div style="font-size:15px; color:#333; line-height:1.8;">
                    {!! nl2br(e($blog->description)) !!}
                </div>

            </div>

            {{-- ── RIGHT: Sidebar ──────────────── --}}
            <div class="col-md-4">
                <div id="sticky-sidebar" style="border:1px solid #e0e0e0; border-radius:8px; padding:20px;">
                    <h5
                        style="font-weight:700; font-size:16px; margin-bottom:20px; border-bottom:1px solid #eee; padding-bottom:10px;">
                        Latest Blog Posts
                    </h5>

                    @foreach($latestBlogs as $latest)
                    @php
                    $latestImg = $latest->image ? \Storage::disk($disk)->url($latest->image) :
                    asset('images/default-blog.jpg');
                    @endphp
                    <a href="{{ route('blog.show', $latest->slug) }}"
                        style="display:flex; gap:12px; margin-bottom:16px; text-decoration:none; align-items:center;">
                        <img src="{{ $latestImg }}" alt="{{ $latest->title }}"
                            style="width:70px; height:55px; object-fit:cover; border-radius:6px; flex-shrink:0;">
                        <div>
                            <p style="font-size:13px; font-weight:700; color:#111; margin:0 0 4px;">
                                {{ $latest->title }}
                            </p>
                            <p style="font-size:12px; color:#888; margin:0;">
                                {{ \Carbon\Carbon::parse($latest->created_at)->format('d M Y') }}
                            </p>
                        </div>
                    </a>
                    @endforeach

                </div>
            </div>

        </div>
    </div>
</section>

@endsection

<style>
    /* Desktop: sticky sidebar */
    @media (min-width: 768px) {
        #sticky-sidebar {
            position: sticky;
            top: 20px;
        }
    }

    @media (max-width: 767px) {
        #sticky-sidebar {
            position: relative;
            top: auto;
            margin-top: 30px;
        }
    }
</style>
