<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model {
	const CREATED_AT = null;
	const UPDATED_AT = 'modified';
	protected $table = 'mp_settings';
}
