@extends('home')

@section('content')
	<div>
		<form action="{{route('tariff.store')}}" method="post">
			@csrf
			<input type="hidden" name="service_id" value="{{$service->id}}">
			<div class="mb-3 row">
				<label for="contractLength" class="col-sm-2 col-form-label text-end">Contract length</label>
				<div class="col-sm-10">
					<input type="contractLength" class="form-control" id="contractLength" name="contractLength">
				</div>
			</div>
			<div class="mb-3 row">
				<label for="price" class="col-sm-2 col-form-label text-end">Price</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="price" name="price">
				</div>
			</div>
			<div class="col-auto">
				<button type="submit" class="btn btn-primary mb-3">Save</button>
			</div>
		</form>
	</div>
@endsection
