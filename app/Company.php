<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{

	protected $fillable = [
		'user_id','company_name', 'crte', 'validity', 'description', 'industry', 'address', 'website', 'logo', 'rep_fullname', 'rep_position', 'rep_contact' , 'rep_email'
	];

    public function jobs()
    {
    	return $this -> hasMany('App\Job');
    }
    
    public function getRouteKeyName()
    {
    	return 'company_name';
    }

}
