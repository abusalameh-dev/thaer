@if (session('message')) 
	<div class="alert alert-{{session('status')}} alert-dismissible">		
		<button type="button" class="close pull-left" data-dismiss="alert" aria-hidden="true">×</button>
		{{ session('message') }}
	</div>
@endif
