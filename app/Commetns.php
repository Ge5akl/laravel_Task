<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commetns extends Model
{
        public function parent(){
            return $this->hasMany('App\Commetns','id', 'parent_id');
        }

        public function user(){
            return $this->hasMany('App\Users', 'id', 'User_id');
        }

}
	