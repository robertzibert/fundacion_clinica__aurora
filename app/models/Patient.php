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
		"address"    
    ];
    
	public function user(){

		return $this -> belongsTo('user');
	}
}