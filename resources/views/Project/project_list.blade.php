{{--
resources/views/Project/partials/project-list.blade.php
This partial is rendered both on first load (full page) and AJAX requests.
--}}

<div class="row g-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div class="result-box">
            <div class="result-count">
                <input type="text" class="form-control" value="{{ $ProductServiuces->total() }} Results Found" readonly>
            </div>
        </div>
    </div>

    @forelse ($ProductServiuces as $ProductServiuce)
        <div class="col-md-4 col-lg-4">
            <div class="project-card">
                <div class="card-img">
                    @php
                        $image = $ProductServiuce->image
                            ? \Illuminate\Support\Facades\Storage::disk(
                                config('filesystems.voucher_disk', 'public'),
                            )->url($ProductServiuce->image)
                            : asset('Project/1.png');
                    @endphp

                    <img src="{{ $image }}" class="img-fluid" alt="Product Image">
                    <span class="roi">ROI {{ $ProductServiuce->rio }}%</span>
                    <span
                        class="status {{ \Carbon\Carbon::now()->gt($ProductServiuce->end_date) ? 'closed' : 'active' }}">
                        {{ \Carbon\Carbon::now()->gt($ProductServiuce->end_date) ? 'Closed' : 'Active' }}
                    </span>
                </div>

                <div class="card-body">
                    <h5>{{ $ProductServiuce->name }}</h5>

                    <div class="price-box">
                        <span>Per Share</span>
                        <h4>৳{{ number_format($ProductServiuce->per_share, 2) }}</h4>
                    </div>

                    <div class="info-box">
                        <div class="d-flex">
                            <span>Start date:</span>
                            <span>{{ date('d M Y', strtotime($ProductServiuce->start_date)) }}</span>
                        </div>
                        <div class="d-flex">
                            <span>Maturity Date:</span>
                            <span>{{ date('d M Y', strtotime($ProductServiuce->end_date)) }}</span>
                        </div>
                        <div class="d-flex">
                            <span>Project Duration:</span>
                            <span>{{ $ProductServiuce->duration }} Months</span>
                        </div>
                        <div class="d-flex">
                            <span>Remaining Unit:</span>
                            <span>
                                @php
                                    $cleanPrice = str_replace(',', '', $ProductServiuce->price);
                                    $cleanPerShare = str_replace(',', '', $ProductServiuce->per_share);
                                    $price = floatval($cleanPrice);
                                    $perShare = floatval($cleanPerShare);
                                    echo $perShare > 0 ? number_format($price / $perShare, 0) . ' Units' : '0 Units';
                                @endphp
                            </span>
                        </div>
                        <div class="d-flex">
                            <span>Investment Time:</span>
                            <span>
                                @php
                                    $days = \Carbon\Carbon::now()->diffInDays($ProductServiuce->end_date, false);
                                @endphp
                                {{ $days < 0 ? '0' : round($days) }} days </span>
                        </div>
                    </div>

                    @if (\Carbon\Carbon::now()->gt($ProductServiuce->end_date))
                        <button class="btn closed-btn w-100" disabled>Project Closed</button>
                    @else
                        {{-- data-id passes the project ID to the JS click handler --}}
                        <button class="btn invest-btn w-100" data-id="{{ $ProductServiuce->id }}">
                            Invest Now
                        </button>
                    @endif
                </div>
            </div>
        </div>
    @empty
        <div class="col-12 text-center py-5">
            <p class="text-muted">No projects found matching your criteria.</p>
        </div>
    @endforelse
</div>

{{-- ===== Custom AJAX Pagination ===== --}}
@if ($ProductServiuces->lastPage() > 1)
    <div class="d-flex justify-content-center mt-4">
        <nav class="custom-pagination">
            <div class="pagination-wrapper">
                <span class="pagination-info">
                    Showing <strong>{{ $ProductServiuces->firstItem() }}</strong> to
                    <strong>{{ $ProductServiuces->lastItem() }}</strong> of
                    <strong>{{ $ProductServiuces->total() }}</strong> results
                </span>
                <ul class="pagination-list">
                    {{-- Previous --}}
                    <li class="{{ $ProductServiuces->onFirstPage() ? 'disabled' : '' }}">
                        <a href="#" class="ajax-page-link"
                            data-page="{{ $ProductServiuces->currentPage() - 1 }}">&#8249;</a>
                    </li>

                    {{-- Page Numbers --}}
                    @for ($p = 1; $p <= $ProductServiuces->lastPage(); $p++)
                        <li class="{{ $p == $ProductServiuces->currentPage() ? 'active' : '' }}">
                            <a href="#" class="ajax-page-link"
                                data-page="{{ $p }}">{{ $p }}</a>
                        </li>
                    @endfor

                    {{-- Next --}}
                    <li class="{{ !$ProductServiuces->hasMorePages() ? 'disabled' : '' }}">
                        <a href="#" class="ajax-page-link"
                            data-page="{{ $ProductServiuces->currentPage() + 1 }}">&#8250;</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
@endif
