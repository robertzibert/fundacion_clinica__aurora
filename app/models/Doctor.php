<?php

class Doctor extends \Eloquent {
	
	protected $table = 'doctors';
	
	protected $guarded = ['id'];

	protected $fillable = [

		"rut",
		"name",
		"lastname",
		"email",
		"university",
		"password"
	];

	protected $hidden = ['password'];

	 
	public function appointment(){

		return $this-> hasMany('Appointment');
	}

//Scopes

	public function scopeAre_free($query,$date){
		
	}
	




}