<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table = 'notification';
    protected $fillable = ['name', 'detail', 'color', 'target_start', 'target_finish', 'id_jenis_notification', 'working_status'];
}
