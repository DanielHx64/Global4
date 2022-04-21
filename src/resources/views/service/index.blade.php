@extends('home')

@section('content')
	@if(session('message'))
		<div id="message" class="m-auto w-50 text-center pt-1 bg-success">{{session('message')}}</div>
	@endif

	<div id="servicesIndex">
		<h1>All sections</h1>

		@foreach($services as $service)
			<div class="card p-4 service">
				<div class="row">
					<div class="col-2 border-end label">Type</div><div class="col-8">{{ucwords($service->type)}}</div>
				</div>
				<div class="row">
					<div class="col-2 border-end label">Name</div><div class="col-8">{{ucwords($service->name)}}</div>
				</div>
				<div class="row pt-3">
					<p class="col-12">Connected Tariffs</p>
					@foreach($service->tariffs ?? [] as $tariff)
						<div class="col-12 tariff">
							<div class="row">
								<div class="col-3 border-end label">Contract Length (Months)</div><div class="col-8">{{$tariff->contractLength}}</div>
							</div>
							<div class="row">
								<div class="col-3 border-end label">Price</div><div class="col-8">£{{$tariff->price}}</div>
							</div>
						</div>
					@endforeach
					<div class="col-12 py-2 text-right">
						<a href="{{route('tariff.create', $service->id)}}" class="btn btn-secondary">Add new tariff</a>
					</div>
				</div>
			</div>
		@endforeach
		<div class="pt-3">
			<a href="{{route('service.create')}}" class="btn btn-secondary">Add new service</a>
		</div>
	</div>
@endsection
