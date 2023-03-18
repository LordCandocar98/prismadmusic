@if(session('status'))
	<div class="alert alert-success">
		<h4>
			<i class="icon fa fa-success"></i> {{ session('status') }}
		</h4>
	</div>
@endif
