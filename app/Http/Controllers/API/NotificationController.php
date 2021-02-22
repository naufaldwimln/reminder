<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Notification;
use App\Models\NotificationTime;
use App\Models\NotificationInvolved;
use HelperGeneral;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /* Update Token dari Firebase to DB kita */
    public function updateToken(Request $request) {
        $data = User::find(Auth::user()->id);
        $data->remember_token = $request->token;
        if ($data->save()) {
            return response()->json([
                'status_code' => 200,
                'success' => true,
                'data' => $request->token
            ]);
        } else {
            return response()->json([
                'status_code' => 400,
                'success' => false,
                'data' => $data->id
            ]);
        }
    }

    /* Cronjob for check notification time */
    public function checkingNotification() {
        $data = NotificationTime::where('status', '0')->get();
        $date_first = date('Y-m-d H:i:00');
        $date_second = date('Y-m-d H:i:59');
        
        foreach ($data as $value) {
            if ($value->time_notif >= $date_first && $value->time_notif <= $date_second ) {

                $notification = Notification::find($value->id_notification);
                $data_user = NotificationInvolved::where('id_notification', $value->id_notification)->get();

                if (!empty($notification->working_status)) {
                    if ($notification->working_status === 'Harian') {
                        // Perjam
                        if (date('H') == getHour($value->time_notif)) {
                            foreach ($data_user as $user) {
                                self::updateNotifStatus($value->id);
                                \Log::info('user'.$user->id_user);
                                return self::postNotification($user->id_user, $notification->name, $notification->detail);
                            }
                        }
                    } else if ($notification->working_status === 'Mingguan') {
                        // Hari apa saja
                        if (date('l') == getDay($value->time_notif)) {
                            if ($value->time_notif >= $date_first && $value->time_notif <= $date_second ) {
                                foreach ($data_user as $user) {
                                    self::updateNotifStatus($value->id);
                                    \Log::info('user'.$user->id_user);
                                    return self::postNotification($user->id_user, $notification->name, $notification->detail);
                                }
                            }
                        }
                    } else if ($notification->working_status === 'Bulanan') {
                        // Tanggal Berapa saja
                        if (date('d' == date('d', strtotime($value->time_notif)))) {
                            foreach ($data_user as $user) {
                                if ($value->time_notif >= $date_first && $value->time_notif <= $date_second ) {
                                    self::updateNotifStatus($value->id);
                                    \Log::info('user'.$user->id_user);
                                    return self::postNotification($user->id_user, $notification->name, $notification->detail);
                                }
                            }
                        }
                    } else if ($notification->working_status === 'Tahunan') {
                        // Bulan Apa saja
                        if (date('F') == getMounth($value->time_notif)) {
                            if ($value->time_notif >= $date_first && $value->time_notif <= $date_second ) {
                                foreach ($data_user as $user) {
                                    self::updateNotifStatus($value->id);
                                    \Log::info('user'.$user->id_user);
                                    return self::postNotification($user->id_user, $notification->name, $notification->detail);
                                }
                            }
                        }
                    }
                } else {
                    foreach ($data_user as $user) {
                        self::updateNotifStatus($value->id);
                        \Log::info('user'.$user->id_user);
                        return self::postNotification($user->id_user, $notification->name, $notification->detail);
                    }
                }
            }
        }
    }

    private function updateNotifStatus($id) {
        $notif = NotificationTime::find($id);
        $notif->status = 1;
        return $notif->save();
    }

    private function postNotification($id_user, $head, $detail) {

        // $device_id = "clEniJtiRv20hAci5rHm5m:APA91bHP9EHCgTahMRqMPPuxh8W0kgXH4wBb4Vr9qx-450-VtI6yQjqlZ-VFOsPH0HJmayac6VsLWqG9f6yTClhbIm77Dr2Als0Mc36c25BHZ9xtdmV-v1ZJfb5PzcVQtQJh2G3UU7HC";
        $device_id = User::find($id_user)->remember_token;
        if (empty($device_id)) {
            return;
        }
        \Log::info('user'.$id_user.' message. head: '.$head.' detail: '.$detail);
        //API URL of FCM
        $url = 'https://fcm.googleapis.com/fcm/send';

        /*api_key available in:
        Firebase Console -> Project Settings -> CLOUD MESSAGING -> Server key*/    
        $api_key = detail_app()->token_api;
        // 'AAAA0ueqkwI:APA91bFXjeGUgKVx0yw-Y_RaBvBxzElgP_G2k1wJDYwScqJHB8RduDlzIrfM95jrcj-WwDgxY_QTDNjFh57XcmgQXU9Q87rNix3fo58UVYA0YKylhxIXNWZKQLsuNoK8J54rdG7xSCcv';
                    
        $fields = array (
            'registration_ids' => array (
                $device_id
            ),
            'notification' => array (
                'title' => $head,
                'body'  => $detail
            )
        );
        // $fields = json_encode($fields);

        //header includes Content type and api key
        $headers = array(
            'Authorization:key='.$api_key,
            'Content-Type:application/json'
        );
                    
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('FCM Send Error: ' . curl_error($ch));
        }
        curl_close($ch);

        return $result;
    }

    public function testingPost() {

        $device_id = "clEniJtiRv20hAci5rHm5m:APA91bHP9EHCgTahMRqMPPuxh8W0kgXH4wBb4Vr9qx-450-VtI6yQjqlZ-VFOsPH0HJmayac6VsLWqG9f6yTClhbIm77Dr2Als0Mc36c25BHZ9xtdmV-v1ZJfb5PzcVQtQJh2G3UU7HC";
        //API URL of FCM
        $url = 'https://fcm.googleapis.com/fcm/send';

        $api_key = 'AAAA0ueqkwI:APA91bFXjeGUgKVx0yw-Y_RaBvBxzElgP_G2k1wJDYwScqJHB8RduDlzIrfM95jrcj-WwDgxY_QTDNjFh57XcmgQXU9Q87rNix3fo58UVYA0YKylhxIXNWZKQLsuNoK8J54rdG7xSCcv';
                    
        $fields = array (
            'registration_ids' => array (
                $device_id
            ),
            'notification' => array (
                'title' => 'Head',
                'body'  => 'detail'
            )
        );
        // $fields = json_encode($fields);

        //header includes Content type and api key
        $headers = array(
            'Authorization:key='.$api_key,
            'Content-Type:application/json'
        );
                    
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('FCM Send Error: ' . curl_error($ch));
        }
        curl_close($ch);

        return $result;
    }
}
