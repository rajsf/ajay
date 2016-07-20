@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Home</div>

				<div class="panel-body">
					@foreach ($hotel_list as $user)
					<div style="padding:50px;border:1px solid gray;margin:10px;float:left"> <h3><a href="{{ URL::to('addcomments/' . $user->id) }}">{{ $user->name }} </a></h3></div>
				@endforeach
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
