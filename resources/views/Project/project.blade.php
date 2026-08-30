@extends('layouts.FontEndApps')

@section('title')
    <title>Ongoing Project</title>
@endsection

@section('style')
@endsection

@section('content')
    <style>
        .project-card {
            border: none;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            height: 100%;
            background: #fff;
        }

        .project-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.15);
        }

        .project-img-wrapper {
            position: relative;
            height: 240px;
            overflow: hidden;
        }

        .project-img-wrapper {
            position: relative;
            height: 160px;
            overflow: hidden;
        }

        .show-more-btn {
            background: #171747;
            color: #fff;
            border: none;
            padding: 12px 40px;
            border-radius: 50px;
            font-weight: 600;
            letter-spacing: 0.3px;
            transition: all 0.3s ease;
        }

        .show-more-btn:hover {
            background: #0A9F43;
            color: #fff;
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
        }

        .show-more-btn:disabled {
            opacity: 0.7;
            cursor: not-allowed;
        }

        .project-img-wrapper .carousel,
        .project-img-wrapper .carousel-inner,
        .project-img-wrapper .item,
        .project-img-wrapper img {
            height: 100%;
            width: 100%;
        }

        .project-img-wrapper img {
            height: 160px !important;
            max-height: 160px !important;
            width: 100% !important;
            max-width: 100% !important;
            object-fit: cover;
            display: block;
            transition: transform 0.5s ease;
        }

        .project-img-wrapper .carousel-control {
            width: 32px;
            height: 32px;
            top: 45%;
            background: rgba(0, 0, 0, 0.4);
            border-radius: 50%;
            opacity: 0;
            transition: opacity 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            text-shadow: none;
        }

        .project-card:hover .carousel-control {
            opacity: 1;
        }

        .carousel-control.left {
            left: 8px;
        }

        .carousel-control.right {
            right: 8px;
        }

        .project-card:hover .project-img-wrapper img {
            transform: scale(1.05);
        }

        .project-body {
            padding: 20px;
        }

        .project-title {
            font-size: 1.25rem;
            font-weight: 700;
            margin-bottom: 10px;
            color: #222;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .project-desc {
            color: #666;
            font-size: 0.95rem;
            line-height: 1.6;
            margin-bottom: 15px;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            min-height: 4.8em;
        }

        .project-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-top: 1px solid #eee;
            padding-top: 15px;
            margin-top: 10px;
        }

        .price-tag {
            font-weight: 700;
            color: #e74c3c;
            font-size: 1.1rem;
        }

        .return-badge {
            background: #27ae60;
            color: white;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .filter-sidebar {
            background: #fff;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.06);
            position: sticky;
            top: 100px;
        }

        .filter-title {
            font-weight: 700;
            margin-bottom: 15px;
            font-size: 1.1rem;
            border-bottom: 2px solid #f1f1f1;
            padding-bottom: 10px;
        }

        .no-projects {
            text-align: center;
            padding: 80px 20px;
            color: #888;
        }

        .project-card {
            display: flex;
            flex-direction: column;
        }

        .project-body {
            display: flex;
            flex-direction: column;
            flex: 1;
        }

        .project-meta {
            margin-top: auto;
        }

        .read-more-btn:hover,
        .read-more-btn:focus {
            text-decoration: underline;
            color: #087c34 !important;
        }

        .doc-section-title {
            font-weight: 700;
            position: relative;
            display: inline-block;
            margin-bottom: 40px;
        }

        .doc-section-title::after {
            content: '';
            position: absolute;
            left: 50%;
            bottom: -12px;
            transform: translateX(-50%);
            width: 60px;
            height: 3px;
            background: #0A9F43;
            border-radius: 2px;
        }
    </style>
    {{-- Page Title --}}
    <div class="page-title page-main-section" style="margin-top: -8px">
        <div class="container padding-bottom-top-120 text-uppercase text-center">
            <div class="main-title">
                <h1>Ongoing Project</h1>
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
                <a href="{{ route('home') }}">home</a>
                <span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>
                <a href="#">Ongoing Project</a>
            </div>
        </div>
    </div>

    {{-- Main Content --}}
    <section class="py-5" style="background: #f8f9fa;">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h3 class="doc-section-title">Ongoing Project</h3>
                </div>
                {{-- Project List --}}
                <div class="col-lg-12">
                    <div id="projectListContainer">
                        <div class="row g-4" id="projectCardsRow">
                            @include('Project.project_cards', ['ProductServiuces' => $ProductServiuces])
                        </div>

                        @if ($ProductServiuces->hasMorePages())
                            <div class="text-center mt-4" id="showMoreWrapper">
                                <button type="button" class="show-more-btn" id="showMoreBtn"
                                    data-next-page="{{ $ProductServiuces->currentPage() + 1 }}">
                                    Show More <i class="fa fa-angle-down ms-1"></i>
                                </button>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            let loadedPages = 1; // track how many pages currently shown
            function initCarousels() {
                $('.project-img-wrapper .carousel').each(function() {
                    $(this).carousel({
                        interval: 3000,
                        pause: 'hover'
                    });
                });
            }

            initCarousels();
            // ── Filters: replace the whole grid, back to page 1 ──────────────────
            $('#projectFilterForm').on('submit', function(e) {
                e.preventDefault();
                loadedPages = 1;
                loadProjects(1, false);
            });

            $('.category-check, input[name="return_type[]"]').on('change', function() {
                loadedPages = 1;
                loadProjects(1, false);
            });

            function loadProjects(page = 1, append = true) {
                let formData = $('#projectFilterForm').length ? $('#projectFilterForm').serialize() : '';
                formData += '&ajax=1&page=' + page;

                if (!append) {
                    $('#projectCardsRow').html(
                        '<div class="col-12 text-center py-5"><div class="spinner-border text-primary" role="status"></div><p class="mt-3">Loading projects...</p></div>'
                    );
                }

                $.ajax({
                    url: "{{ route('project') }}",
                    type: 'GET',
                    data: formData,
                    success: function(response) {
                        if (append) {
                            $('#projectCardsRow').append(response.html);
                        } else {
                            $('#projectCardsRow').html(response.html);
                        }
                        initCarousels();
                        $('#showMoreWrapper').remove();

                        let buttonsHtml = '<div class="text-center mt-4" id="showMoreWrapper">';

                        if (response.has_more) {
                            buttonsHtml +=
                                '<button type="button" class="show-more-btn" id="showMoreBtn" data-next-page="' +
                                response.next_page +
                                '">Show More <i class="fa fa-angle-down ms-1"></i></button>';
                        }

                        if (loadedPages > 1) {
                            buttonsHtml +=
                                ' <button type="button" class="show-more-btn" id="showLessBtn">Show Less <i class="fa fa-angle-up ms-1"></i></button>';
                        }

                        buttonsHtml += '</div>';

                        $('#projectListContainer').append(buttonsHtml);
                    },
                    error: function() {
                        $('#projectCardsRow').html(
                            '<div class="col-12"><div class="alert alert-danger">Something went wrong. Please try again.</div></div>'
                        );
                    }
                });
            }

            // ── Show More: append next page ───────────────────────────────────────
            $(document).on('click', '#showMoreBtn', function() {
                let btn = $(this);
                let nextPage = btn.data('next-page');

                btn.prop('disabled', true).html(
                    '<span class="spinner-border spinner-border-sm"></span> Loading...');

                loadedPages = nextPage;
                loadProjects(nextPage, true);
            });

            // ── Show Less: reset back to page 1 ─────────────────────────────────────
            $(document).on('click', '#showLessBtn', function() {
                loadedPages = 1;
                loadProjects(1, false);

                $('html, body').animate({
                    scrollTop: $('#projectListContainer').offset().top - 100
                }, 400);
            });
        });
    </script>
@endsection
