<?php

class Schedule extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = [
		"time",
		"date",
		"doctor_id"
	];

}