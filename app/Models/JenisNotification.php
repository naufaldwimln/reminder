<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JenisNotification extends Model
{
	protected $table = 'jenis_notification';
    protected $fillable = ['name', 'status'];
}
