@forelse ($ProductServiuces as $project)
    <div class="col-md-4 col-lg-4">
        <div class="project-card">
            {{-- Image / Slider --}}
            <div class="project-img-wrapper">
                @php
                    $disk = config('filesystems.voucher_disk', 'public');
                    $images = [];

                    // Gather all non-empty image columns (image, image1..image4)
                    foreach (['image', 'image1', 'image2', 'image3', 'image4'] as $imgField) {
                        if (!empty($project->{$imgField})) {
                            $images[] = $project->{$imgField};
                        }
                    }

                    if (empty($images)) {
                        $images = [asset('assets/images/default-project.jpg')];
                    }
                @endphp

                @if (count($images) > 1)
                    <div id="carouselProject{{ $project->id }}" class="carousel slide" data-ride="carousel"
                        data-interval="3000">
                        <div class="carousel-inner">
                            @foreach ($images as $index => $img)
                                <div class="item {{ $index === 0 ? 'active' : '' }}">
                                    <img src="{{ Str::startsWith($img, ['http', '/']) ? $img : \Illuminate\Support\Facades\Storage::disk($disk)->url($img) }}"
                                        alt="{{ $project->name }}">
                                </div>
                            @endforeach
                        </div>
                        <a class="left carousel-control" href="#carouselProject{{ $project->id }}" data-slide="prev">
                            <span class="fa fa-angle-left"></span>
                        </a>
                        <a class="right carousel-control" href="#carouselProject{{ $project->id }}" data-slide="next">
                            <span class="fa fa-angle-right"></span>
                        </a>
                    </div>
                @else
                    <img src="{{ Str::startsWith($images[0], ['http', '/']) ? $images[0] : \Illuminate\Support\Facades\Storage::disk($disk)->url($images[0]) }}"
                        alt="{{ $project->name }}">
                @endif
            </div>

            {{-- Body --}}
            <div class="project-body">
                <h5 class="project-title">
                    {{ $project->name }}
                </h5>

                <p class="project-desc">
                    {{ Str::limit(strip_tags($project->description ?? ($project->short_description ?? 'No description available.')), 120) }}
                </p>

                <div class="project-meta">
                    @php
                        $fullDesc = strip_tags($project->description ?? ($project->short_description ?? ''));
                    @endphp
                    @if (strlen($fullDesc) > 3)
                        <button type="button" class="btn btn-sm btn-link p-0 read-more-btn" data-toggle="modal"
                            data-target="#projectDescModal{{ $project->id }}" style="font-weight:600; color:#0A9F43;">
                            Show More
                        </button>
                    @endif
                </div>
            </div>
        </div>

        {{-- Full description modal --}}
        <div class="modal fade" id="projectDescModal{{ $project->id }}" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ $project->name }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p style="line-height:1.7; color:#444;">{{ $fullDesc }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@empty
    <div class="col-12">
        <div class="no-projects">
            <i class="fa fa-folder-open fa-4x mb-3 text-muted"></i>
            <h4>No Projects Found</h4>
        </div>
    </div>
@endforelse
