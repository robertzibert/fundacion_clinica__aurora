<?php

class Patient extends \Eloquent {
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'patients';
	
	protected $fillable = [

		"phone",
		"cellphone",
		"insurance",
		"blood_type",
		"gender",
		"address"    
    ];
 
 	public function appointment(){

		return $this-> hasMany('Appointment');
	}
	public function user(){

		return $this -> hasOne('User');
	}
}