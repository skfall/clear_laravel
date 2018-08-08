<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserGroup extends Model {
    protected $table = 'mp_user_groups';
    const CREATED_AT = 'created';
    const UPDATED_AT = 'modified';

}
