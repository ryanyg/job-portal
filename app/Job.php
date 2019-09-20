<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\User;
class Job extends Model
{
	protected $fillable = [ 'user_id' , 'company_id' ,'category','position' , 'position_level' , 'number_vacancy', 'work_schedule' , 'description' , 'education' , 'work_experience', 'gender' , 'status','skill'];

    public function getRouteKeyName()
    {
    	return 'position';
    }

    public function company()
    {
    	return $this -> belongsTo('App\Company');
    }

    public function users()
    {
        return $this -> belongsToMany(User::class) -> withTimeStamps();
    }    

    public function checkApplication()
    {
    	return \DB::table('job_user') -> where ('user_id', auth() -> user() -> id) -> where('job_id', $this -> id) -> exists();
    }

}


