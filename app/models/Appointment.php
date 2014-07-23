<?php

class Appointment extends \Eloquent {
	
	protected $table = 'appointments';
	
	protected $fillable = [
		
		"price",
		"state",
		"active_at",
		"doctor_id",
		"patient_id"
	];

	protected $guarded = ['id',"user_id","doctor_id"];

	public function doctor(){

		return $this -> belongsTo("Doctor");

	} 

	public function user(){

		return $this -> belongsTo("Patient");

	} 

	public function diagnose(){

		return $this -> hasOne("Diagnose");

	} 
}

