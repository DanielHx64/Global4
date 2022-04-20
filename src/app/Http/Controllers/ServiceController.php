<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ServiceController extends Controller
{
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		Service::create([
			'name' => $request->post('name'),
			'type' => $request->post('type'),
		]);
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
     * @param  \Illuminate\Http\Request  $request
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
