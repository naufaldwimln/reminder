<?php

namespace App\Http\Controllers;

use Session;
use App\Models\Role;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Validation\ValidatesRequests;

class RoleController extends Controller
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
        return view('admin.role.index')
            ->with('role', Role::orderBy('id', 'asc')->get());
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
            'nama_user_group' => 'required'
        ]);

        Role::create([
            'nama_user_group' => $request->nama_user_group
        ]);

        Session::flash('success', 'Role berhasil simpan');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        $role = Role::findOrFail($role->id);
        return response()->json($role);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);

        $role->nama_user_group = $request->nama_user_group;
        $role->save();

        Session::flash('success', 'Role berhasil di update');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::find($id)->delete();

        Session::flash('success', 'Role berhasil di hapus');
        return redirect()->back();
    }


    public function groupmenu($id){
        $grupmenus = Role::getGrupmenu($id);
        return view('admin.role.groupmenu')
            ->with('menus', Menu::orderBy('urutan', 'asc')->get())
            ->with('grupmenus', $grupmenus);
    }

    public function update_groupmenu(Request $request, $id)
    {
        $data = Role::updateGrupMenu($request->cek, $request->id_menu, $id, $request->action);

        $response = array(
            'status' => 'success',
            'data'  => $data,
            'id'    => $id,
            'iduser'    => $request->id_menu
        );

        return response()->json($response);
    }
}
