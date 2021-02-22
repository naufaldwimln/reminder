<?php

namespace App\Http\Controllers;

use Session;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Validation\ValidatesRequests;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */

    use ValidatesRequests;

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.user.index')
            ->with('roles', Role::where('id', '!=', '1')->get())
            ->with('users', User::select('users.*', 'roles.nama_user_group')
                ->join('roles', 'roles.id', 'users.id_user_group')
                ->where('users.id_user_group', '!=', '1')->orderBy('users.id', 'asc')->paginate(10));
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
         $this->validate($request, [
            'nama' => 'required',
            'email' => 'required',
            'role' => 'required',
            'password' => 'required'
        ]);

        User::create([
            'name' => $request->nama,
            'email' => $request->email,
            'id_user_group' => $request->role,
            'password' => Hash::make($request->password)
        ]);

        Session::flash('success', 'User berhasil simpan');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return response()->json($user);
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
        $role = User::findOrFail($id);

        $role->name = $request->nama;
        $role->email = $request->email;
        $role->id_user_group = $request->role;
        $role->save();

        Session::flash('success', 'User berhasil di update');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = User::find($id)->delete();

        Session::flash('success', 'User berhasil di hapus');
        return redirect()->back();
    }
}
