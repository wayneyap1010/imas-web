<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmailConfiguration extends Model
{
    protected $fillable = [
        'id', 'smtp_server', 'smtp_port', 'email_account', 'email_password', 'created_at', 'updated_at'
    ];
}
