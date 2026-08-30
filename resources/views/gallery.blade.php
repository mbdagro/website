@extends('layouts.FontEndApps')
@section('title')
    <title>Gallery</title>
@endsection
<style>
    .hidden-fancy-link {
        position: absolute;
        width: 1px;
        height: 1px;
        overflow: hidden;
        clip: rect(0, 0, 0, 0);
        white-space: nowrap;
        border: 0;
        padding: 0;
        margin: -1px;
    }
</style>
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
                <a href="{{ route('home') }}">home</a><span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>
                <a href="gallery-3.html">Gallery</a>
            </div>
        </div>
    </div>
    <section id="project" class="padding">
        <div class="container">
            @if (count($gallery) > 0)
                <div class="row mb-4">
                    <div class="col-md-12 text-center">
                        <h2 class="text-uppercase font-weight-bold">
                            Image Gallery
                        </h2>
                        <hr style="width:80px; border:2px solid #f39c12;">
                    </div>
                </div>
            @endif
            <div id="nospace" class="cbp">
                @foreach ($gallery as $gallery_img)
                    <div class="cbp-item latest rent">
                        <div class="image">

                            @php
                                $disk = config('filesystems.voucher_disk', 'public');
                                $imageUrl = Storage::disk($disk)->url($gallery_img->image);

                                // multi_image safely normalize
                                $multiImages = $gallery_img->multi_image;
                                if (is_string($multiImages)) {
                                    $multiImages = json_decode($multiImages, true);
                                }
                                if (!is_array($multiImages)) {
                                    $multiImages = [];
                                }
                            @endphp

                            <img src="{{ $imageUrl }}" alt=""
                                style="height: 200px; width: 300px; object-fit:cover;">

                            <h4>{{ $gallery_img->name }}</h4>

                            @php
                                $allImages = array_merge(
                                    [$imageUrl],
                                    array_map(fn($p) => Storage::disk($disk)->url($p), $multiImages),
                                );
                            @endphp
                            <div class="overlay">
                                <a href="javascript:void(0)" class="custom-gallery-trigger centered"
                                    data-images='@json($allImages)'>

                                    <i class="icon-focus"></i>

                                </a>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
            {{-- VIDEO TITLE --}}
            @if (count($VideoLink) > 0)
                <div class="row mt-5 mb-4">
                    <div class="col-md-12 text-center">
                        <h2 class="text-uppercase font-weight-bold">
                            Video Gallery
                        </h2>
                        <hr style="width:80px; border:2px solid #f39c12;">
                    </div>
                </div>
            @endif
            <div class="row mt-5">
                @foreach ($VideoLink as $video)
                    <div class="col-md-4 mb-4">
                        <iframe width="100%" height="250"
                            src="https://www.youtube.com/embed/{{ trim($video->video_link) }}?rel=0"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                        </iframe>
                    </div>
                @endforeach
            </div>
        </div>
        <!-- Custom Image Slider Modal -->
        <div id="customGalleryModal"
            style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.9); z-index:99999;">
            <span id="customGalleryClose"
                style="position:absolute; top:20px; right:35px; color:#fff; font-size:40px; cursor:pointer; z-index:100000;">&times;</span>

            <span id="customGalleryPrev"
                style="position:absolute; top:50%; left:20px; transform:translateY(-50%); color:#fff; font-size:50px; cursor:pointer; z-index:100000; user-select:none;">&#10094;</span>

            <div style="display:flex; align-items:center; justify-content:center; height:100%; padding:40px;">
                <img id="customGalleryImage" src=""
                    style="max-width:90%; max-height:85vh; object-fit:contain; border-radius:6px;">
            </div>

            <span id="customGalleryNext"
                style="position:absolute; top:50%; right:20px; transform:translateY(-50%); color:#fff; font-size:50px; cursor:pointer; z-index:100000; user-select:none;">&#10095;</span>

            <div id="customGalleryCounter"
                style="position:absolute; bottom:20px; left:50%; transform:translateX(-50%); color:#fff; font-size:16px;">
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            let currentImages = [];
            let currentIndex = 0;

            function showImage(index) {
                if (currentImages.length === 0) return;
                if (index < 0) index = currentImages.length - 1;
                if (index >= currentImages.length) index = 0;
                currentIndex = index;
                $('#customGalleryImage').attr('src', currentImages[currentIndex]);
                $('#customGalleryCounter').text((currentIndex + 1) + ' / ' + currentImages.length);
            }

            $(document).on('click', '.custom-gallery-trigger', function(e) {
                e.preventDefault();
                currentImages = $(this).data('images');
                showImage(0);
                $('#customGalleryModal').fadeIn(200);
            });

            $('#customGalleryClose').on('click', function() {
                $('#customGalleryModal').fadeOut(200);
            });

            $('#customGalleryPrev').on('click', function() {
                showImage(currentIndex - 1);
            });

            $('#customGalleryNext').on('click', function() {
                showImage(currentIndex + 1);
            });

            // close on background click (but not on image click)
            $('#customGalleryModal').on('click', function(e) {
                if (e.target.id === 'customGalleryModal') {
                    $(this).fadeOut(200);
                }
            });

            // keyboard navigation
            $(document).on('keydown', function(e) {
                if ($('#customGalleryModal').is(':visible')) {
                    if (e.key === 'ArrowLeft') showImage(currentIndex - 1);
                    if (e.key === 'ArrowRight') showImage(currentIndex + 1);
                    if (e.key === 'Escape') $('#customGalleryModal').fadeOut(200);
                }
            });
        });
    </script>
@endsection
