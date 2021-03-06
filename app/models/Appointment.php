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

	protected $guarded = ['id'];

	public function doctor(){

		return $this -> belongsTo("Doctor");

	} 

	public function patient(){

		return $this->belongsTo("Patient");

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

