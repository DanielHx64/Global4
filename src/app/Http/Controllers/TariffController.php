<?php

namespace App\Http\Controllers;

use App\Service;
use App\Tariff;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class TariffController extends Controller
{
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return View
	 */
	public function create($serviceID)
	{
		$service = Service::find($serviceID);
		return view('tariff.create', [
			'service' => $service
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
		Tariff::create([
			'service_id' => $request->post('service_id'),
			'contractLength' => $request->post('contractLength'),
			'price' => $request->post('price'),
		]);
		return redirect(route('service.index'))->with('message', 'Tariff added');
	}
}
