<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CustomerController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return View
	 */
	public function index()
	{
		$customers = Customer::
			with('contracts')
			->with('tariff')
			->with('service')
			->get()
		;

		return view('customer.index', [
			'customers' => $customers,
		]);
	}
}
