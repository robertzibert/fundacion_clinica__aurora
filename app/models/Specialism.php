<?php

class Specialism extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = [
		"name",
	];

	public function doctor(){

		return $this -> hasOne('Doctor');
	}
}