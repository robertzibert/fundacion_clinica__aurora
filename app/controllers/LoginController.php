<?php

class LoginController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /login
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('home');
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /login/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /login
	 *
	 * @return Response
	 */
	public function store()
	{

		$input = Input::only('email','password');
		
		if(Auth::attempt($input)){
			if(Auth::user()->role_id == 1){
				return Redirect::route('admins.index');			
			}
			elseif (!Auth::user()->doctor_id==NULL) {
				return Redirect::route('doctors.index');			
			}
			elseif (!Auth::user()->patient_id==NULL) {
				return Redirect::route('users.index');			
			}
		}
	}

	/**
	 * Display the specified resource.
	 * GET /login/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /login/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /login/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /login/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Auth::logout();
	}

}