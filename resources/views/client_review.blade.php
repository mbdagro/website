@extends('layouts.FontEndApps')
@section('content')
	<!-- list-head -->
	<div class="list-head">
		<div class="container">
			<div class="section-head">
				<h4> Client Review / Pleasent </h4>
				<div class="underline"></div>
				<div class="underline2"></div>
			</div>
		</div>
	</div>
	<!-- end list-head -->

    <div class="container mt-3">
        <div class="row">
            <div class="col s12">
                {{-- <img src="{{ asset($ClientReview->client_review) }}" alt="{{ $ClientReview->client_review }}" width="100% "> --}}
                <img src="{{ URL::to('public') }}/{{ $ClientReview->client_review }}" alt="aa" width="100%">
            </div>
         </div>
    </div>
	<!-- end grid -->

	<!-- loader -->
	<div id="fakeLoader"></div>
	<!-- end loader -->
@endsection
