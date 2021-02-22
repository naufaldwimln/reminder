<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NotificationTime extends Model
{
    protected $table = 'notification_time';
    protected $fillable = ['id_notification', 'time_notif', 'detail', 'status'];
}
