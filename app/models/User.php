<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The fillable variables by the model.
	 *
	 */

	protected $fillable = [

		"name",
		"insurance",
		"lastname",
		"blood_type",
		"rut",
		"phone",
		"cellphone",
		"address",
    	"email"
    ];
    /**
     *  The hidden variable that never show the model
     */
	protected $guarded = ['id'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the token value for the "remember me" session.
	 *
	 * @return string
	 */
	public function getRememberToken()
	{
		return $this->remember_token;
	}

	/**
	 * Set the token value for the "remember me" session.
	 *
	 * @param  string  $value
	 * @return void
	 */
	public function setRememberToken($value)
	{
		$this->remember_token = $value;
	}

	/**
	 * Get the column name for the "remember me" token.
	 *
	 * @return string
	 */
	public function getRememberTokenName()
	{
		return 'remember_token';
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}
	/**
	 * Hasheamos todas las passwords del usuario por default
	 * @var string 
	 * @return hassed_string 
	 */
  public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);

    }
	//Relationships
	public function appointment(){

		return $this -> hasMany('Appointment');
	}

	public function patient(){

		return $this-> belongsTo('Patient');
	}
	public function doctor(){

		return $this-> belongsTo('Doctor');
	}

}