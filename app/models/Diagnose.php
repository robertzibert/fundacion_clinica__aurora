<?php

class Diagnose extends \Eloquent {
	
	protected $table = 'diagnosis';
	
	protected $fillable = ['observations'];

	protected $guarded = ['id','appointment_id'];

	public function appointment(){

		return $this -> belongsTo('Appointment');
	}

}