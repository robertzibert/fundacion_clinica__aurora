<?php

class Appointment extends \Eloquent {
	
	protected $table = 'appointments';
	
	protected $fillable = [
		
		"price",
		"state",
		"active_at"
	];

	protected $guarded = ['id',"user_id","doctor_id"];

	public function doctor(){

		return $this -> belongsTo("Doctor");

	} 

	public function user(){

		return $this -> belongsTo("User");

	} 

	public function diagnose(){

		return $this -> hasOne("Diagnose");

	} 
	public function getActiveAt(){

		return $this -> hasOne("Diagnose");

	} 
	
	public function getDates()
	{
    return ['created_at','updated_at','active_at'];
	}
}

