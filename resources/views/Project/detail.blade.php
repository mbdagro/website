@extends('layouts.FontEndApps')
@section('title')
<title>{{ $project->name }} - Project Details</title>
@endsection

@section('content')
<div class="page-title page-main-section" style="margin-top: -8px">
    <div class="container padding-bottom-top-120 text-uppercase text-center">
        <div class="main-title">
            <h1>Project Details</h1>
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
            <a href="{{ route('home') }}">Home</a>
            <span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>
            <a href="{{ route('project') }}">Ongoing Projects</a>
            <span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>
            <a href="#">{{ $project->name }}</a>
        </div>
    </div>
</div>

<div class="container marginTopButtom py-5">
    <div class="row custom-section">
        <h1 class="section-title">Project Details</h1>
    </div>
    <div class="row">

        {{-- ===== Left: Project Image & Badge ===== --}}
        <div class="col-lg-6 mb-4">
            <div class="project-detail-img position-relative"
                style="overflow:hidden; border-radius:12px; width:100%; max-height:340px;">

                {{-- <img src="{{ asset($project->image ?? 'Project/1.png') }}" alt="{{ $project->name }}"
                    class="img-fluid rounded shadow"
                    style="width:100%; height:340px; object-fit:cover; object-position:center; display:block;"> --}}

                {{-- @php
                $image = $project->image
                ? \Illuminate\Support\Facades\Storage::disk(
                config('filesystems.voucher_disk', 'public'),
                )->url($project->image)
                : asset('Project/1.png');
                @endphp --}}

                @php
                $images = [];

                if ($project->image) {
                $images[] = Storage::disk(config('filesystems.voucher_disk', 'public'))->url($project->image);
                }

                if ($project->image1) {
                $images[] = Storage::disk(config('filesystems.voucher_disk', 'public'))->url($project->image1);
                }

                if ($project->image2) {
                $images[] = Storage::disk(config('filesystems.voucher_disk', 'public'))->url($project->image2);
                }

                if ($project->image3) {
                $images[] = Storage::disk(config('filesystems.voucher_disk', 'public'))->url($project->image3);
                }

                if ($project->image4) {
                $images[] = Storage::disk(config('filesystems.voucher_disk', 'public'))->url($project->image4);
                }

                if (count($images) == 0) {
                $images[] = asset('Project/1.png');
                }
                @endphp

                <div id="projectSlider" class="carousel slide" data-ride="carousel" data-interval="2000">

                    <div class="carousel-inner">

                        @foreach($images as $key => $img)
                        <div class="item {{ $key == 0 ? 'active' : '' }}">
                            <img src="{{ $img }}" style="width:100%;height:340px;object-fit:cover;">
                        </div>
                        @endforeach

                    </div>

                    @if(count($images) > 1)

                    <a class="left carousel-control" href="#projectSlider" role="button" data-slide="prev">

                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>

                    <a class="right carousel-control" href="#projectSlider" role="button" data-slide="next">

                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>

                    @endif

                </div>
                <span class="badge bg-success position-absolute"
                    style="top:15px; left:15px; font-size:1rem; padding:8px 14px;">
                    ROI {{ $project->rio }}%
                </span>

                @php $isClosed = \Carbon\Carbon::now()->gt($project->end_date); @endphp
                <span class="badge position-absolute" style="top:15px; right:15px; font-size:1rem; padding:8px 14px;
                           background: {{ $isClosed ? '#dc3545' : '#28a745' }};">
                    {{ $isClosed ? 'Closed' : 'Active' }}
                </span>
            </div>

            {{-- Category Badge --}}
            @if ($project->category)
            <div class="mt-3">
                <span class="badge bg-primary px-3 py-2" style="font-size:.9rem;">
                    {{ $project->category->name }}
                </span>
            </div>
            @endif

            {{-- Project Description --}}
            @if ($project->description)
            <div class="mt-4 p-4 bg-light rounded shadow-sm">
                <h5 class="fw-bold mb-3"><i class="fa fa-info-circle me-2"></i>About This Project</h5>
                <p class="text-muted mb-0" style="line-height:1.8;">{!! $project->description !!}</p>
            </div>
            @endif
        </div>

        {{-- ===== Right: Project Info ===== --}}
        <div class="col-lg-6">
            <div class="project-detail-info p-4 shadow rounded bg-white">
                <h2 class="fw-bold mb-4">{{ $project->name }}</h2>

                {{-- Per Share Price --}}
                <div class="price-highlight mb-4 p-3 rounded"
                    style="background:linear-gradient(135deg,#007bff22,#00c6ff22); border-left:4px solid #007bff;">
                    <span class="text-muted small">Per Share Price</span>
                    <h3 class="text-primary fw-bold mb-0">৳{{ number_format($project->per_share, 2) }}</h3>
                </div>

                {{-- Info Table --}}
                <table class="table table-borderless info-table">
                    <tbody>
                        <tr>
                            <td class="text-muted fw-semibold" style="width:45%;">
                                <i class="fa fa-calendar me-2 text-primary"></i>Start Date
                            </td>
                            <td class="fw-bold">{{ date('d M Y', strtotime($project->start_date)) }}</td>
                        </tr>
                        <tr>
                            <td class="text-muted fw-semibold">
                                <i class="fa fa-flag-checkered me-2 text-danger"></i>Maturity Date
                            </td>
                            <td class="fw-bold">{{ date('d M Y', strtotime($project->end_date)) }}</td>
                        </tr>
                        <tr>
                            <td class="text-muted fw-semibold">
                                <i class="fa fa-clock-o me-2 text-warning"></i>Duration
                            </td>
                            <td class="fw-bold">{{ $project->duration }} Months</td>
                        </tr>
                        <tr>
                            <td class="text-muted fw-semibold">
                                <i class="fa fa-cubes me-2 text-success"></i>Total Units
                            </td>
                            <td class="fw-bold">
                                @php
                                $cleanPrice = str_replace(',', '', $project->price);
                                $cleanPerShare = str_replace(',', '', $project->per_share);
                                $price = floatval($cleanPrice);
                                $perShare = floatval($cleanPerShare);
                                echo $perShare > 0
                                ? number_format($price / $perShare, 0) . ' Units'
                                : '0 Units';
                                @endphp
                            </td>
                        </tr>
                        <tr>
                            <td class="text-muted fw-semibold">
                                <i class="fa fa-hourglass-half me-2 text-info"></i>Days Remaining
                            </td>
                            <td class="fw-bold">
                                @php
                                $days = \Carbon\Carbon::now()->diffInDays($project->end_date, false);
                                @endphp
                                {{ $days < 0 ? 0 : round($days) }} days </td>
                        </tr>
                        <tr>
                            <td class="text-muted fw-semibold">
                                <i class="fa fa-percent me-2 text-success"></i>ROI
                            </td>
                            <td class="fw-bold text-success">{{ $project->rio }}%</td>
                        </tr>
                        <tr>
                            <td class="text-muted fw-semibold">
                                <i class="fa fa-money me-2 text-primary"></i>Total Value
                            </td>
                            <td class="fw-bold">৳{{ number_format($project->price, 2) }}</td>
                        </tr>
                    </tbody>
                </table>

                {{-- Investment Progress Bar (optional visual) --}}
                <div class="mt-3 mb-4">
                    <div class="d-flex justify-content-between mb-1">
                        <small class="text-muted">Investment Progress</small>
                        <small class="text-muted fw-bold">
                            @php
                            $progressDays = \Carbon\Carbon::parse($project->start_date)->diffInDays(
                            \Carbon\Carbon::now(),
                            );
                            $totalDays = \Carbon\Carbon::parse($project->start_date)->diffInDays(
                            $project->end_date,
                            );
                            $progressPct =
                            $totalDays > 0 ? min(100, round(($progressDays / $totalDays) * 100)) : 100;
                            @endphp
                            {{ $progressPct }}% Elapsed
                        </small>
                    </div>
                    <div class="progress" style="height:10px; border-radius:10px;">
                        <div class="progress-bar bg-primary" style="width:{{ $progressPct }}%; border-radius:10px;">
                        </div>
                    </div>
                </div>

                {{-- Action Buttons --}}
                <div class="d-flex gap-3 mt-4">
                    @if ($isClosed)
                    <button class="btn btn-secondary w-100" disabled style="font-size:1rem; padding:12px;">
                        <i class="fa fa-lock me-2"></i>Project Closed
                    </button>
                    @else
                    <a href="{{ $project->id }}" class="btn btn-primary w-100"
                        style="font-size:1rem; padding:12px; background:linear-gradient(135deg,#007bff,#00c6ff); border:none;">
                        <i class="fa fa-arrow-circle-right me-2"></i>Invest Now
                    </a>
                    @endif

                    <a href="{{ route('project') }}" class="btn btn-outline-secondary"
                        style="font-size:1rem; padding:12px 20px;">
                        <i class="fa fa-arrow-left me-2"></i>Back
                    </a>
                </div>

            </div>
        </div>

    </div>

    {{-- ===== Related Projects ===== --}}
    @if (isset($relatedProjects) && $relatedProjects->count() > 0)
    <div class="mt-5">
        <h3 class="fw-bold mb-4 section-title">Related Projects</h3>
        <div class="row g-4">
            @foreach ($relatedProjects as $related)
            <div class="col-md-4">
                <div class="project-card">
                    <div class="card-img">
                        @php
                        $imageUrl = $related->image
                        ? \Illuminate\Support\Facades\Storage::disk(
                        config('filesystems.voucher_disk', 'public'),
                        )->url($related->image)
                        : asset('Project/1.png');
                        @endphp
                        <img src="{{ $imageUrl }}" alt="{{ $project->name }}" class="img-fluid">
                        {{-- <img src="{{ asset($related->image ?? 'Project/1.png') }}" class="img-fluid"> --}}
                        <span class="roi">ROI {{ $related->rio }}%</span>
                        <span class="status {{ \Carbon\Carbon::now()->gt($related->end_date) ? 'closed' : 'active' }}">
                            {{ \Carbon\Carbon::now()->gt($related->end_date) ? 'Closed' : 'Active' }}
                        </span>
                    </div>
                    <div class="card-body">
                        <h5>{{ $related->name }}</h5>
                        <div class="price-box">
                            <span>Per Share</span>
                            <h4>৳{{ number_format($related->per_share, 2) }}</h4>
                        </div>
                        <a href="{{ route('project.show', $related->id) }}" class="btn invest-btn w-100 mt-2">View
                            Details</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif

</div>
@endsection
