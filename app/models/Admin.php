<?php

class Admin extends \Eloquent {
	
	protected $table = 'admins';

	protected $fillable = [

		'rut',
		'name',
		'lastname',
		'email',
		'password'
    
    ];

	protected $guarded = ['id'];

	protected $hidden = ['password'];

}