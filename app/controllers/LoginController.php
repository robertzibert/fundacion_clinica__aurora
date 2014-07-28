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
		if(Auth::check()){
				if(Auth::user()->role_id == 1){
					return Redirect::route('admins.index');			
				}
				elseif (!Auth::user()->doctor_id == NULL) {
					return Redirect::to('doctors/'.Auth::user()->doctor_id);			
				}
			}
			else{
					return View::make('home');			
				}
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
			elseif (!Auth::user()->doctor_id == NULL) {
				return Redirect::to('doctors/'.Auth::user()->doctor_id);			
			}
			else{
				Session::flash('message', 'This is a message!'); 
				return Redirect::to('/');			
			}
		}
		else{
				Session::flash('message', 'Porfavor revisa que los datos sean correctos'); 
				return Redirect::to('/');			
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
	public function destroy()
	{
		Auth::logout();
		return Redirect::to('/');
	}

}