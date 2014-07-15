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

	public function scopeAre_active($query){
	// Este scope trae los eventos que están activos
	// Las variables que entra son el doctor, el usuario, y la fecha
		return $query->join('doctors', 'doctor_id', '=', 'doctors.id')
								 ->where ('appointments.state', 'confirmed')
								 ->orWhere('appointments.state', 'reserved')
								 ->select('doctors.id', 'doctors.name','doctors.rut','appointments.state')
								 ->get();
	}

}

