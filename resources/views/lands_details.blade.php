@extends('layouts.FontEndApps')
@section('content')
	<!-- single -->
	<div class="pages section">
		<div class="container">
			<div class="single">
				<div class="single-content">
					<h5>Minimalist Home Luxury</h5>
					<span><i class="fa fa-map-marker"></i>574 Green Park, New York</span>
					<div class="date">
						<span><i class="fa fa-user"></i>Posted By: <a href="#">John Doe</a></span>
						<span><i class="fa fa-calendar"></i> Dec 22, 2018</span>
					</div>
					<div class="line"></div>
				</div>
				<div class="properties">
					<div id="owl-properties">
						<div class="item">
							<a href="{{ asset('FontEndUI/') }}/img/real-estate1.jpg" class="image-popup" data-effect="mfp-zoom-in"><img class="responsive-img" src="{{ asset('FontEndUI/') }}/img/real-estate1.jpg" alt="sample image"></a>
						</div>
						<div class="item">
							<a href="{{ asset('FontEndUI/') }}/img/real-estate2.jpg" class="image-popup"><img class="responsive-img" src="{{ asset('FontEndUI/') }}/img/real-estate2.jpg" alt="sample image"></a>
						</div>
						<div class="item">
							<a href="{{ asset('FontEndUI/') }}/img/real-estate3.jpg" class="image-popup"><img class="responsive-img" src="{{ asset('FontEndUI/') }}/img/real-estate3.jpg" alt="sample image"></a>
						</div>
					</div>
				</div>
				<div class="single-content">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi error omnis rem quibusdam corporis alias, et quae, assumenda unde pariatur vitae placeat veritatis nam quia, velit delectus.</p>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint ut vitae recus mquam id minus!</p>
					<h6>Property Details</h6>
					<ul>
						<li>Name: Minimalist Home Luxury</li>
						<li>Price: $19000</li>
						<li>Offers: For Sale</li>
						<li>Phone: +0800000000</li>
						<li>Email: loremm@ipsum.com</li>
						<li>Type: Minimalist 38</li>
						<li>Area: 300m<sup>2</sup></li>
						<li>bedroom: 3</li>
						<li>Bathroom: 2</li>
						<li>Car Park: 2</li>
					</ul>

					<h6>Property Features</h6>
					<ul>
						<li>Sport Arena</li>
						<li>Food</li>
						<li>Wifi</li>
						<li>Pool Tour</li>
						<li>Orchards</li>
						<li>Airport</li>
						<li>Univercity</li>
					</ul>

					<div class="share-post">	
						<ul>
							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#"><i class="fa fa-google"></i></a></li>
							<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
						</ul>
					</div>
				</div>	
				<div class="comment">
					<h5>1 Comments</h5>
					<div class="comment-details">
						<div class="row">
							<div class="col s3">
								<img src="{{ asset('FontEndUI/') }}/img/user-comment.jpg" alt="">
							</div>
							<div class="col s9">
								<div class="comment-title">
									<span><strong>John Doe</strong> | Juni 5, 2016 at 9:24 am | <a href="#">Reply</a></span>
								</div>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis accusantium corrupti asperiores et praesentium dolore.</p>
							</div>
						</div>
					</div>
				</div>	
				<div class="comment-form">
					<div class="comment-head">
						<h5>Post Comment in Below</h5>
						<p>Lorem ipsum dolor sit amet consectetur*</p>
					</div>
					<div class="row">
						<form class="col s12 form-details">
							<div class="input-field">
								<input type="text" required class="validate" placeholder="Name">
							</div>
							<div class="input-field">
								<input type="email" class="validate" placeholder="Email" required>
							</div>
							<div class="input-field">
								<input type="text" class="validate" placeholder="Subject" required>
							</div>
							<div class="input-field">
								<textarea name="textarea-message" id="textarea1" cols="30" rows="10" class="materialize-textarea" class="validate" placeholder="Your Comment"></textarea>
							</div>
							<div class="form-button">
								<button class="button-default">Post Comments</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>	
	</div>
	<!-- end single post -->

	<!-- loader -->
	<div id="fakeLoader"></div>
	<!-- end loader -->
@endsection