@extends('layouts.FontEndApps')
@section('content')
	<!-- list-head -->
	<div class="list-head">
		<div class="container">
			<div class="section-head">
				<h4>Ongoing Duplex Project</h4>
				<div class="underline"></div>
				<div class="underline2"></div>
			</div>
		</div>
	</div>
	<!-- end list-head -->

	<!-- grid -->
	<div class="section real-estate bg-second">
		<div class="container">
			<div class="filter-head">
				<ul>
					<li>
						<select name="pages" id="pages" onchange="location = this.value;">
							<option value="" disabled selected>SELECT</option>
							<option value="{{ route('ongoing.apartments') }}">ONGOING APARTMENTS</option>
							<option value="{{ route('completed.apartments') }}">COMPLETED APARTMENTS</option>
							<option value="{{ route('upcomeing.apartments') }}">UPCOMING APARTMENTS</option>
							<option value="{{ route('consultancy.apartments') }}">TUNKY/CONSULTANCY APARTMENTS</option>
							<option value="{{ route('completed.duplex') }}">DUPLEX PROJECT</option>
							<option value="{{ route('completed.lands') }}">LAND PROJECT</option>
						</select>
					</li>
				</ul>
				<ul class="ul-right">
					<li class="active"><i class="fa fa-th-large"></i></li>
					<!--li><a href="index3.html"><i class="fa fa-th-list"></i></a></li>
					<li><a href="index4.html"><i class="fa fa-stop"></i></a></li-->
				</ul>
			</div>
			<div class="row">
				@foreach($ProductService as $ProductService)
				@if($ProductService->progress=='ongoing')
				<div class="col s6">
					<div class="content">
						<a href="{{ route('apartments.details',['id' => $ProductService->id]) }}">
							<!--span class="price">$1700</span-->
							<img src="{{ asset('/') }}/{{$ProductService->image}}" alt="" >
							<div class="offer-type">
								<span>For Sale</span>
							</div>
							<div class="sub-content">
								<h5>{{$ProductService->name}}</h5>
								<span><i class="fa fa-map-marker"></i>{{$ProductService->short_description}}</span>
							</div>
						</a>
					</div>
				</div>
				@endif
				@endforeach
			</div>
			
			
			
		</div>
	</div>
	<!-- end grid -->
	
	<!-- loader -->
	<div id="fakeLoader"></div>
	<!-- end loader -->
@endsection