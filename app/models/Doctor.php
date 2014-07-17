<?php

class Doctor extends \Eloquent {
	
	protected $table = 'doctors';
	
	protected $guarded = ['id'];

	protected $fillable = [

		"university",
		"phone",
		"cellphone"
	];

	
	public function appointment(){

		return $this-> hasMany('Appointment');
	}
	public function user(){

		return $this -> belongsTo('user');
	}
}