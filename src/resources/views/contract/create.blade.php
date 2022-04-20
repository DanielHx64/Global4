@extends('home')

@section('content')
	<div>
		<form action="{{route('contract.store')}}" method="post">
			@csrf
			<input type="hidden" name="customer_id" value="{{$customer->id}}">
			<div class="mb-3 row">
				<label for="tariff_id" class="col-sm-2 col-form-label required">Tariff</label>
				<div class="col-sm-10">
					<select class="form-control" id="tariff_id" name="tariff_id">
						<option value="">Select</option>
						@foreach($tariffs ?? [] as $tariff)
							<option value="{{$tariff->id}}">{{$tariff->service->type}}:{{$tariff->service->name}} - {{$tariff->contractLength}} (Months)</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="mb-3 row">
				<label for="startDate" class="col-sm-2 col-form-label required">Start Date</label>
				<div class="col-sm-10">
					<input type="date" class="form-control" id="startDate" name="startDate">
				</div>
			</div>
			<div class="col-auto">
				<button type="submit" class="btn btn-primary mb-3">Save</button>
			</div>
		</form>
	</div>
@endsection
