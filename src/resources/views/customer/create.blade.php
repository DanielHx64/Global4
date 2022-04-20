@extends('home')

@section('content')
	<div>
		<form action="{{route('customer.store')}}" method="post">
			@csrf
			<div class="mb-3 row">
				<label for="name" class="col-sm-2 col-form-label required">Name</label>
				<div class="col-sm-7">
					<input type="text" class="form-control" id="name" name="name">
				</div>
			</div>
			<div class="mb-3 row">
				<label for="address" class="col-sm-2 col-form-label required">Address</label>
				<div class="col-sm-7">
					<input type="text" class="form-control" id="address" name="address">
				</div>
			</div>
			<div class="col-auto">
				<button type="submit" class="btn btn-primary mb-3">Save</button>
			</div>
		</form>
	</div>
@endsection
