<html>
	<head>
		<title>Laravel</title>
		
		<link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>

		<style>
			body {
				margin: 0;
				padding: 0;
				width: 100%;
				height: 100%;
				color: #B0BEC5;
				display: table;
				font-weight: 100;
				font-family: 'Lato';
			}

			.container {
				text-align: center;
				display: table-cell;
				vertical-align: middle;
			}

			.content {
				text-align: center;
				display: inline-block;
			}

			.title {
				font-size: 96px;
				margin-bottom: 40px;
			}

			.quote {
				font-size: 24px;
			}
		</style>
	</head>
	<body>
		<div class="container">
			<div class="content">
				
				
				@foreach ($listcomments['myarray'] as $comment)
					<div style="padding:10px;border:1px solid gray;margin:10px;float:left"> <h3>{{ $comment['name'] }}</h3></div>
				@endforeach


				<form class="form-horizontal" role="form" method="POST" action="{{ url('/addcomments') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">Add Your Comment</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="name" value="{{ old('name') }}">
								<input type="hidden" class="form-control" name="hotelid" value="{{ $listcomments['currenthotel_id'] }}">
							</div>
						</div>

						

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Add
								</button>
							</div>
						</div>
					</form>
			</div>
		</div>
	</body>
</html>
