<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GeneralApp extends Model
{
    protected $table = 'general_app';
    protected $fillable = ['name', 'logo_light', 'logo_dark', 'icon', 'token_api', 'facebook', 'twitter', 'instagram', 'email', 'address', 'phone'];
}
