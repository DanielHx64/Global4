@extends('home')

@section('content')
	@if(session('message'))
		<div id="message" class="m-auto w-50 text-center pt-1 bg-success">{{session('message')}}<div>
				@endif

				<div id="servicesIndex">
					<h1>All custommers</h1>

					@foreach($customers as $customer)
						<div class="card p-4 customer">
							<div class="row">
								<div class="col-2 border-end label">Name</div><div class="col-8">{{ucwords($customer->name)}}</div>
							</div>
							<div class="row">
								<div class="col-2 border-end label">Address</div><div class="col-8">{{ucwords($customer->address)}}</div>
							</div>
							<div class="row pt-3">
								<p class="col-12">Customers Contracts:</p>
								@foreach($customer->contracts ?? [] as $contract)
									<div class="col-12 contract">
										<div class="row">
											<div class="col-3 border-end label">Contract Length (Months)</div><div class="col-8">{{$tariff->contractLength}}</div>
										</div>
										<div class="row">
											<div class="col-3 border-end label">Price</div><div class="col-8">£{{$tariff->price}}</div>
										</div>
									</div>
								@endforeach
								<div class="col-12 py-2 text-right">
									<a href="{{route('contract.create', $service->id)}}" class="btn btn-secondary">Add new tariff</a>
								</div>
							</div>
						</div>
					@endforeach
					<div class="pt-3">
						<a href="{{route('customer.create')}}" class="btn btn-secondary">Add new customer</a>
					</div>
				</div>
		@endsection
