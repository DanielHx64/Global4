<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
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
		$customers = Customer::with('contracts.tariff.service')->get();

		dump($customers);

		return view('customer.index', [
			'customers' => $customers,
		]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return View
	 */
	public function create()
	{
		return view('customer.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Application|RedirectResponse|Redirector
	 */
	public function store(Request $request)
	{
		Customer::create([
			'name' => $request->post('name'),
			'address' => $request->post('address'),
		]);

		return redirect(route('customer.index'))->with('message', 'Customer added');
	}
}
