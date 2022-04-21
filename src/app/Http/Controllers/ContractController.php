<?php

namespace App\Http\Controllers;

use App\Contract;
use App\Customer;
use App\Tariff;
use DateTime;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class ContractController extends Controller
{

	public function __construct()
	{
		$this->middleware('can:view-customers');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return View
	 */
	public function create($customerID)
	{
		$customer = Customer::find($customerID);
		$tariffs = Tariff::with('service')->get();

		return view('contract.create', [
			'customer' => $customer,
			'tariffs' => $tariffs,
		]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @return Application|RedirectResponse|Redirector
	 */
	public function store(Request $request)
	{
		$tariff = Tariff::findOrFail($request->post('tariff_id'));
		$contractLength = $tariff->contractLength;

		$startDate = DateTime::createFromFormat('Y-m-d', $request->post('startDate'));
		$endDate = DateTime::createFromFormat('Y-m-d', $request->post('startDate'));
		$endDate->add(new \DateInterval("P{$contractLength}M"));

		Contract::create([
			'customer_id' => $request->post('customer_id'),
			'tariff_id' => $request->post('tariff_id'),
			'startDate' => $startDate,
			'endDate' => $endDate,
		]);
		return redirect(route('customer.index'))->with('message', 'Tariff added');
	}
}
