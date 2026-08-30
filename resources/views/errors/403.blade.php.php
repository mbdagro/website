@extends('layouts.FontEndApps')
@section('content')
			<section class="cs main_color8 section_404 section_padding_top_150 section_padding_bottom_150">
				<div class="container">
					<div class="row">
						<div class="col-md-6 col-md-offset-3 text-center">
							<p class="not_found highlight"> <span>404</span> </p>
							<h1>Oops, page not found!</h1>
							<p>You can look up what you are interested in:</p>
							<div class="widget widget_search">
								<form method="get" class="searchform" action="">
									<div class="form-group"> <label class="sr-only" for="page_search">Search for:</label> <input type="text" id="page_search" value="" name="search" class="form-control" placeholder="Keyword"> <button type="submit" class="theme_button">Search</button> </div>
								</form>
							</div>
							<p> or </p>
							<p> <a href="" class="theme_button color1">Go to homepage</a> </p>
						</div>
					</div>
				</div>
			</section>
@endsection