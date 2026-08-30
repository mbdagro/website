@extends('layouts.FontEndApps')
@section('title')
    <title>Blogs</title>
@endsection
@section('content')
    <style>
        .blog-item.d-none {
            display: none !important;
        }

        .blog-item {
            padding-bottom: 6px !important;
        }
    </style>
    <div class="page-title page-main-section parallaxie" style="margin-top: -8px">
        <div class="container padding-bottom-top-120 text-uppercase text-center">
            <div class="main-title">
                <h1>Blogs</h1>
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
                <a href="{{ route('home') }}">home</a><span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>
                <a href="gallery-3.html">Blogs</a>
            </div>
        </div>
    </div>
    <section style="background:#fff; padding:60px 0;">
        <div class="container">
            <h2 class="text-center fw-bold mb-5">Blogs</h2>
            <div class="row g-4" id="blog-container">
                @forelse($blogs as $blog)
                    <div class="col-md-4 blog-item {{ $loop->iteration > 6 ? 'd-none' : '' }} ">
                        <div class="card h-100" style="border:1px solid #e0e0e0; border-radius:8px; overflow:hidden;">
                            @php
                                $disk = config('filesystems.voucher_disk', 'public');
                                $imgUrl = $blog->image
                                    ? Storage::disk($disk)->url($blog->image)
                                    : asset('images/default-blog.jpg');
                            @endphp
                            <img src="{{ $imgUrl }}" alt="{{ $blog->title }}"
                                style="width:100%; height:200px; object-fit:cover;">

                            <div class="card-body" style="padding:16px;">
                                <h5 style="font-weight:700; font-size:15px; color:#111;">{{ $blog->title }}</h5>
                                <p style="font-size:13px; color:#666; margin-bottom:10px;">
                                    <i class="fa fa-calendar"></i>
                                    {{ \Carbon\Carbon::parse($blog->created_at)->format('d M Y') }}
                                </p>

                                @if ($blog->excerpt)
                                    <p style="font-size:13px; color:#444; line-height:1.5;">
                                        {{ \Str::limit($blog->excerpt, 80) }}
                                    </p>
                                @endif

                                <a href="{{ route('blog.show', $blog->slug) }}"
                                    style="display:inline-block; border:1px solid #bbb; padding:6px 16px; font-size:13px; color:#333; border-radius:4px; text-decoration:none;">
                                    Read More
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center text-muted">No blogs found.</div>
                @endforelse
            </div>
            @if ($blogs->count() > 6)
                <div class="text-center mt-5">
                    <button id="show-more-btn" class="btn btn-dark px-4 py-2" style="border-radius: 4px;">
                        Show More
                    </button>
                </div>
            @endif
        </div>
    </section>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            var $showMoreBtn = $('#show-more-btn');
            var $blogContainer = $('#blog-container');
            $(document).on('click', '#show-more-btn', function() {
                var $btn = $(this);
                var isExpanded = $btn.data('expanded') === true;
                if (!isExpanded) {
                    $blogContainer.find('.blog-item.d-none').removeClass('d-none');
                    $btn.text('Show Less');
                    $btn.data('expanded', true);
                } else {
                    $blogContainer.find('.blog-item').each(function(index) {
                        if (index >= 6) {
                            $(this).addClass('d-none');
                        }
                    });
                    $btn.text('Show More');
                    $btn.data('expanded', false);
                    $('html, body').animate({
                        scrollTop: $blogContainer.offset().top - 100
                    }, 300);
                }
            });
        });
    </script>
@endsection
