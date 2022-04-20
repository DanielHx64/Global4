@extends('home')

@section('content')
	<div>
		<form action="{{route('service.store')}}" method="post">
			@csrf
			<div class="mb-3 row">
				<label for="type" class="col-sm-2 col-form-label text-end">Type</label>
				<div class="col-sm-7">
					<input type="text" class="form-control" id="type" name="type">
				</div>
			</div>
			<div class="mb-3 row">
				<label for="name" class="col-sm-2 col-form-label text-end">Name</label>
				<div class="col-sm-7">
					<input type="text" class="form-control" id="name" name="name">
				</div>
			</div>
			<div class="col-auto">
				<button type="submit" class="btn btn-primary mb-3">Save</button>
			</div>
		</form>
	</div>
@endsection
