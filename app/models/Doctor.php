<?php
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
class Doctor extends \Eloquent {
	
	protected $table = 'doctors';
	
	protected $fillable = [

		"university",
		"phone",
		"cellphone"
	];

	
	public function appointment(){

		return $this-> hasMany('Appointment');
	}
	public function user(){

		return $this -> hasOne('User');
	}
}