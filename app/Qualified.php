<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Profile;
use App\Company;
class Qualified extends Model
{
    public function profile()
    {
        return $this -> hasOne(Profile::class);
    }

    public function company()
    {
        return $this -> hasOne(Company::class);
    }
    
    public function users()
    {
        return $this -> belongsToMany(User::class) -> withTimeStamps();
    }    
}