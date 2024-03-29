<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class ServiceController extends Controller
{

	public function __construct()
	{
		$this->middleware('can:view-services');
	}

	/**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
		$services = Service::with('tariffs')->get();

		return view('service.index', [
			'services' => $services,
		]);
    }

    /**
     * Show the form for creating a new resource.
     *
	 * @return View
     */
    public function create()
    {
		return view('service.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
	 */
    public function store(Request $request)
    {
		Service::create([
			'name' => $request->post('name'),
			'type' => $request->post('type'),
		]);
		return redirect(route('service.index'))->with('message', 'Service added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
	 * @return View
     */
    public function show($id)
    {
		$service = Service::findOrFail($id);

		return view('service.show', [
			'service' => $service,
		]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
	 * @return View
     */
    public function edit($id)
    {
		return view('service.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
