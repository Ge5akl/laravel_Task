<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    public function comments(){
    	return $this->hasMany('App\Commetns', 'parent_id', 'id');
	}
}
