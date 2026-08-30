@extends('layouts.FontEndApps')
@section('title')
    <title>Offer</title>
@endsection
<style>
    @media (min-width: 992px) {
        .col-lg-3.mb-4 {
            position: sticky;
            top: 20px;
            height: fit-content;
            align-self: flex-start;
        }

        .row {
            align-items: flex-start;
        }
    }

    /* AJAX Loading Overlay */
    #projects-loading {
        display: none;
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(255, 255, 255, 0.7);
        z-index: 10;
        align-items: center;
        justify-content: center;
        border-radius: 8px;
    }

    #projects-wrapper {
        position: relative;
        min-height: 300px;
    }

    #projects-loading.active {
        display: flex;
    }

    .spinner-border-custom {
        width: 3rem;
        height: 3rem;
        border: 4px solid #f3f3f3;
        border-top: 4px solid #007bff;
        border-radius: 50%;
        animation: spin 0.8s linear infinite;
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }
</style>

@section('content')
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
                <a href="#">Ongoing Apartments</a>
            </div>
        </div>
    </div>

    <div class="container marginTopButtom">
        <div class="row custom-section">
            <h1 class="section-title">Project</h1>
        </div>
        <div class="container-fluid py-5 project-page">
            <div class="row">

                {{-- ===== SIDEBAR FILTERS ===== --}}
                <div class="col-lg-3 mb-4">
                    <div class="search-box">
                        <i class="fa fa-search"></i>
                        <input type="text" id="search-input" class="form-control" placeholder="Search by keyword...">
                    </div>

                    <div class="filter-box">
                        <h5>Price Filter</h5>
                        <input type="range" class="form-range" id="price-range" min="00" max="50000"
                            value="50000">
                        <div class="d-flex gap-2 mt-3">
                            <input type="text" class="form-control" id="min-price" placeholder="Min 00" value="00">
                            <input type="text" class="form-control" id="max-price" placeholder="Max 50000"
                                value="50000">
                        </div>
                    </div>

                    <div class="filter-box mt-4">
                        <h5>Category</h5>
                        @foreach ($Category as $category)
                            <div class="form-check">
                                <input class="form-check-input category-filter" type="checkbox" value="{{ $category->id }}"
                                    id="cat{{ $category->id }}">
                                <label class="form-check-label" for="cat{{ $category->id }}">
                                    {{ $category->name }}
                                </label>
                            </div>
                        @endforeach
                    </div>

                    <div class="filter-box mt-4">
                        <h5>Return Type</h5>
                        <div class="form-check">
                            <input class="form-check-input return-filter" type="checkbox" value="lifetime"> Life Time
                        </div>
                        <div class="form-check">
                            <input class="form-check-input return-filter" type="checkbox" value="repeated"> Repeated
                        </div>
                    </div>

                    {{-- Reset Button --}}
                    {{-- <button class="btn btn-outline-secondary w-100 mt-3" id="reset-filters">
                    <i class="fa fa-refresh"></i> Reset Filters
                </button> --}}
                </div>

                {{-- ===== PROJECTS AREA ===== --}}
                <div class="col-lg-9">
                    <div id="projects-wrapper">

                        {{-- Loading Spinner --}}
                        <div id="projects-loading">
                            <div class="spinner-border-custom"></div>
                        </div>

                        {{-- Results will be injected here via AJAX --}}
                        <div id="projects-container">
                            @include('Project.project_list', ['ProductServiuces' => $ProductServiuces])
                        </div>

                    </div>
                </div>

            </div>
        </div>
        {{-- why-choose-section --}}
        <section class="why-choose-section">
            <div class="container">
                <div class="row align-items-center">

                    <!-- Left: Image -->
                    <div class="col-lg-6 col-md-12 image-col">
                        <!-- Replace src with your actual image -->
                        <img src="{{ asset('Project/1.png') }}" alt="Investment Analytics" class="main-image">
                        <div class="play-overlay">
                            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <polygon points="5,3 19,12 5,21" />
                            </svg>
                        </div>
                    </div>

                    <!-- Right: Content -->
                    <div class="col-lg-6 col-md-12 content-col">

                        <!-- Badge -->
                        <div class="badge-label">
                            <!-- Leaf SVG icon -->
                            <svg class="leaf-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 2C6 2 3 8 3 12c0 5 4 9 9 9s9-4 9-9C21 6 18 2 12 2z" fill="#2e7d32"
                                    opacity="0.2" />
                                <path d="M12 2 C8 6 6 10 8 14 C10 18 14 18 16 14 C18 10 16 6 12 2Z" fill="#2e7d32" />
                                <line x1="12" y1="14" x2="12" y2="21" stroke="#2e7d32"
                                    stroke-width="1.5" />
                            </svg>
                            <span>Why Choose Us</span>
                        </div>

                        <!-- Title -->
                        <h2 class="section-title">
                            Why You Should Invest<br>With MBD AGRO
                        </h2>

                        <!-- Description -->
                        <p class="section-desc">
                            Invest with confidence in sustainable agriculture and livestock projects, ensuring long-term
                            growth
                            and stable returns.
                        </p>

                        <!-- Features Grid -->
                        <div class="features-grid">
                            <div class="feature-item">
                                <div class="feature-dot"></div>
                                <span class="feature-text-new">Reality-based farm project:</span>
                            </div>
                            <div class="feature-item">
                                <div class="feature-dot"></div>
                                <span class="feature-text-new">Profitable and short-term returns:</span>
                            </div>
                            <div class="feature-item">
                                <div class="feature-dot"></div>
                                <span class="feature-text-new">Transparency and regular reporting:</span>
                            </div>
                            <div class="feature-item">
                                <div class="feature-dot"></div>
                                <span class="feature-text-new">Experienced management team:</span>
                            </div>
                            <div class="feature-item">
                                <div class="feature-dot"></div>
                                <span class="feature-text-new">Diverse projects and sectors:</span>
                            </div>
                            <div class="feature-item">
                                <div class="feature-dot"></div>
                                <span class="feature-text-new">Contractual safe investment:</span>
                            </div>
                        </div>

                        <!-- Button -->
                        <a href="{{ route('project') }}" class="btn-see-projects">See Projects</a>

                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {

            // ─── State ─────────────────────────────────────────────────────────────
            var currentPage = 1;
            var searchTimer = null;
            var ajaxUrl = "{{ route('project') }}"; // adjust route name if needed
            var detailBaseUrl = "{{ url('project') }}"; // e.g. /project/{id}

            // ─── Collect filters ────────────────────────────────────────────────────
            function getFilters(page) {
                page = page || 1;

                var categories = [];
                $('.category-filter:checked').each(function() {
                    categories.push($(this).val());
                });

                var returnTypes = [];
                $('.return-filter:checked').each(function() {
                    returnTypes.push($(this).val());
                });

                return {
                    page: page,
                    keyword: $('#search-input').val(),
                    min_price: $('#min-price').val(),
                    max_price: $('#max-price').val(),
                    category: categories,
                    return_type: returnTypes
                };
            }

            // ─── Load Projects via AJAX ─────────────────────────────────────────────
            function loadProjects(page) {
                currentPage = page || 1;

                $('#projects-loading').addClass('active');

                $.ajax({
                    url: ajaxUrl,
                    type: 'GET',
                    data: $.extend(getFilters(currentPage), {
                        ajax: 1
                    }),
                    success: function(response) {
                        $('#projects-container').html(response.html);
                        $('#projects-loading').removeClass('active');

                        // Scroll to projects area smoothly
                        $('html, body').animate({
                            scrollTop: $('#projects-wrapper').offset().top - 100
                        }, 300);
                    },
                    error: function() {
                        $('#projects-loading').removeClass('active');
                        alert('Something went wrong. Please try again.');
                    }
                });
            }

            // ─── Pagination click (delegated) ──────────────────────────────────────
            $(document).on('click', '.ajax-page-link', function(e) {
                e.preventDefault();
                var page = $(this).data('page');
                if (page) loadProjects(page);
            });

            // ─── Category filter change ─────────────────────────────────────────────
            $(document).on('change', '.category-filter, .return-filter', function() {
                loadProjects(1);
            });

            // ─── Keyword search (debounced 500ms) ───────────────────────────────────
            $('#search-input').on('input', function() {
                clearTimeout(searchTimer);
                searchTimer = setTimeout(function() {
                    loadProjects(1);
                }, 500);
            });

            // ─── Price range slider ─────────────────────────────────────────────────
            $('#price-range').on('input', function() {
                $('#max-price').val($(this).val());
                clearTimeout(searchTimer);
                searchTimer = setTimeout(function() {
                    loadProjects(1);
                }, 600);
            });

            $('#min-price, #max-price').on('change', function() {
                loadProjects(1);
            });

            // ─── Reset filters ──────────────────────────────────────────────────────
            $('#reset-filters').on('click', function() {
                $('.category-filter, .return-filter').prop('checked', false);
                $('#search-input').val('');
                $('#min-price').val('00');
                $('#max-price').val('500000');
                $('#price-range').val('500000');
                loadProjects(1);
            });

            // ─── Invest Now → Details Page ───────────────────────────────────────────
            $(document).on('click', '.invest-btn', function() {
                var projectId = $(this).data('id');
                window.location.href = detailBaseUrl + '/' + projectId;
            });

        });
    </script>
@endsection
