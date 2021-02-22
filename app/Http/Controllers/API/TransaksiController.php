<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use App\Models\Notification;
use App\Models\NotificationTime;
use App\Models\NotificationInvolved;
use HelperGeneral;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array();
        foreach (Role::where('id', '!=', '1')->get() as $value) {
            array_push($data, array(
                'id' => $value->id,
                'role' => $value->nama_user_group,
                'item' => User::where('id_user_group', $value->id)->where('id', '!=', Auth::user()->id)->get()
            ));
        }

        return response()->json([
            'status_code' => 200,
            'success' => true,
            'data' => $data
        ]);
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
        $data = $request->json()->all();

        $notification                        = new Notification;
        $notification->name                  = $data['name'];
        $notification->detail                = $data['detail'];
        $notification->color                 = rand(0,4);
        $notification->target_start          = date('Y-m-d');
        $notification->id_jenis_notification = $data['id_jenis_notification'] == 'true' ? '1' : '0';
        $notification->working_status        = $data['id_jenis_notification'] == 'true' ? $data['working'] : '';
        $notification->save();

        $id_notification = $notification->id;

        foreach (explode('||', substr($data['person'], 0, -2)) as $value) {
            $id_user = User::where('email', $value)->first();
            $involved                  = new NotificationInvolved();
            $involved->id_notification = $id_notification;
            $involved->id_user         = $id_user->id;
            $involved->detail          = '';
            $involved->save();
        }

        $involved                  = new NotificationInvolved();
        $involved->id_notification = $id_notification;
        $involved->id_user         = Auth::user()->id;
        $involved->detail          = 'Created';
        $involved->save();

        foreach (explode('||', substr($data['notif_time'], 0, -2)) as $value) {
            $time                  = new NotificationTime();
            $time->id_notification = $id_notification;
            $time->time_notif      = $value;
            $time->detail          = '';
            $time->status          = '0';
            $time->save();
        }

        return response()->json([
            'status_code'      => 200,
            'success'          => true,
            'data'             => $id_notification
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $data = Notification::select('notification.*', 'time.time_notif', 'time.status')
            ->join('notification_involved', 'notification_involved.id_notification', '=', 'notification.id')
            ->join('notification_time as time', function ($join) {
                $join->on('notification.id', '=', 'time.id_notification')
                ->where('time.status', '1');
            })->where('id_user', Auth::user()->id)->get();

        return response()->json([
            'status_code' => 200,
            'success' => true,
            'data' => $data
        ]);
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
}
