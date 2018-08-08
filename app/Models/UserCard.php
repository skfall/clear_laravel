<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserCard extends Model {
    protected $table = 'mp_user_cards';
    const CREATED_AT = 'created';
    const UPDATED_AT = 'modified';

    public function user() {
    	return $this->belongsTo('App\Models\User', 'user_id', 'id');
  	}

  	public function country(){
  		return $this->hasOne('App\Models\User', 'country_id');
  	}
}
