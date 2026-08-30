@extends('layouts.FontEndApps')
@section('content')
<div class="container-fluid">
	<br><br><br>
	<div class="wrapper-content-sign-in">
		<div class="container text-center">
			<form id="user_login" class="contact-form file-upload-form input-text-center" method="POST" action="{{ route('login') }}">
					@csrf	
						<div class="row columns_margin_bottom_20">
							<div class="col-xs-12 col-sm-12">
								<div class="form-group"> <input type="tel" size="30" value="" name="mobile" id="mobile" class="form-control" placeholder="Mobile"> </div>
							</div>			
							<div class="col-xs-12 col-sm-12">
								<div class="form-group"> <input type="password" size="30"  name="password" id="password" class="form-control" placeholder="Password"> </div>
							</div>																									
							<div class="col-xs-12 topmargin_0">
								<div class="contact-form-submit"> <button type="submit" class="theme_button bg_button color1 min_width_button">Submit</button> </div>
							</div>										
						</div>
					</form>
		</div>
	</div>
</div>
@endsection
@section('script')
<script>
	$(document).ready(function(){
		$('#user_login').ajaxForm({
			beforeSend: formBeforeSend,
			beforeSubmit: formBeforeSubmit,
			error: formError,
			success: function (responseText, statusText, xhr, $form) {
				formSuccess(responseText, statusText, xhr, $form);
				//location.href = responseText.url;
				window.location.href = '/admin';
			},
			clearForm: true,
			resetForm: true
		});
	});
</script>
@endsection	