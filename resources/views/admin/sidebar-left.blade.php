<div class="sidebar-left">
	<div class="user-menu-items">
		<div class="list-unstyled btn-group">
			<button class="media btn btn-link" aria-haspopup="true" aria-expanded="false">
				<span class="message_userpic">
					<img class="d-flex mr-3" src="{{ asset('apps_resource/') }}/img/user-header.png" alt="Generic user image">
				</span>
				<span class="media-body">
					<span class="mt-0 mb-1">{{Auth::User()->name}}</span>
					<span>{{Auth::User()->address}}</span>
				</span>
			</button>
		</div>
	</div>
	<br>
	<ul class="nav flex-column in" id="side-menu">
		<li class="nav-item"> <a href="{{ route('admin.dashboard') }}" class="menudropdown nav-link"><i class="fa fa-dashboard left-icon"></i>Dashboard <i class=" "></i></a></li>

		<li class="nav-item"> <a href="javascript:void(0)" class="menudropdown nav-link"><i class="fa fa-retweet left-icon"></i>Web Manager<i class="fa fa-angle-down "></i></a>
			<ul class="nav flex-column nav-second-level">
				<li class="nav-item"><a class="nav-link" href="{{route('home_management.view')}}" ><i class="fa fa-retweet left-icon"></i>Home Management</a></li>
				<li class="nav-item"><a class="nav-link" href="{{route('our_team.view')}}" ><i class="fa fa-retweet left-icon"></i>Our Team</a></li>
				<li class="nav-item"><a class="nav-link" href="{{route('our_director.view')}}" ><i class="fa fa-retweet left-icon"></i>Our Directors</a></li>
				<li class="nav-item"><a class="nav-link" href="{{route('authority_speech.view')}}" ><i class="fa fa-retweet left-icon"></i>Authority Speech</a></li>
				<li class="nav-item"><a class="nav-link" href="{{route('gallary.view')}}" ><i class="fa fa-retweet left-icon"></i>Gallary</a></li>
				<li class="nav-item"><a class="nav-link" href="{{route('productservice.view')}}" ><i class="fa fa-retweet left-icon"></i>Project/Offer</a></li>
				<li class="nav-item"><a class="nav-link" href="{{route('reward.view')}}" ><i class="fa fa-retweet left-icon"></i>Reward</a></li>
				<li class="nav-item"><a class="nav-link" href="{{route('client_review.view')}}" ><i class="fa fa-retweet left-icon"></i>Client Review</a></li>
				<li class="nav-item"><a class="nav-link" href="{{route('news_event.view')}}" ><i class="fa fa-retweet left-icon"></i>News Event</a></li>
				<li class="nav-item"><a class="nav-link" href="{{route('notice_board.view')}}" ><i class="fa fa-retweet left-icon"></i>Notice</a></li>
				<li class="nav-item"><a class="nav-link" href="{{route('what_makes_us_best.view')}}" ><i class="fa fa-retweet left-icon"></i>What Makes Us Best</a></li>
				<li class="nav-item"><a class="nav-link" href="{{route('concern.view')}}" ><i class="fa fa-retweet left-icon"></i>Our Sister Concern</a></li>
				<li class="nav-item"><a class="nav-link" href="{{route('sister_project.view')}}" ><i class="fa fa-retweet left-icon"></i>Our Sister Project</a></li>
				<li class="nav-item"><a class="nav-link" href="{{route('booking-info.view')}}" ><i class="fa fa-retweet left-icon"></i>Booking Info</a></li>
				<li class="nav-item"><a class="nav-link" href="{{route('video-link.view')}}" ><i class="fa fa-retweet left-icon"></i>Video Link</a></li>
				<li class="nav-item"><a class="nav-link" href="{{route('pricing.view')}}" ><i class="fa fa-retweet left-icon"></i>Pricing</a></li>
				<li class="nav-item"><a class="nav-link" href="{{route('carrer.view')}}" ><i class="fa fa-retweet left-icon"></i>Carrer</a></li>
				<li class="nav-item"><a class="nav-link" href="{{route('category.view')}}" ><i class="fa fa-retweet left-icon"></i>Category</a></li>
				<li class="nav-item"><a class="nav-link" href="{{route('faq.index')}}" ><i class="fa fa-retweet left-icon"></i>FAQ</a></li>
				<li class="nav-item"><a class="nav-link" href="{{route('journey.view')}}" ><i class="fa fa-retweet left-icon"></i>Our Journey</a></li>
				<li class="nav-item"><a class="nav-link" href="{{route('blog.index')}}" ><i class="fa fa-retweet left-icon"></i>Add Blogs</a></li>
				<li class="nav-item"><a class="nav-link" href="{{ route('document.index') }}"><i class="fa fa-file-pdf-o"></i> Documents</a></li>
			</ul>
		</li>
		<li class="nav-item"><a class="nav-link" href="{{route('contact_us.view')}}" ><i class="fa fa-retweet left-icon"></i>Contact us/Order List</a></li>

	</ul>
</div>
