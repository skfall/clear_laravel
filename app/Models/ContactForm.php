<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactForm extends Model {
    protected $table = 'osc_contact_form';
    const CREATED_AT = 'created';
    const UPDATED_AT = 'modified';
}
