<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NotificationInvolved extends Model
{
    protected $table = 'notification_involved';
    protected $fillable = ['id_notification', 'id_user', 'detail'];
}
