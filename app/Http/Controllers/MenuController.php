<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Models\Menu;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Foundation\Validation\ValidatesRequests;

class MenuController extends Controller
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
        return view('admin.menu.index')
            ->with('menus', Menu::orderBy('urutan', 'asc')->orderBy('id', 'asc')->get())
            ->with('parrents', Menu::all());
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('menu::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_menu' => 'required',
            'urutan'   => 'required|integer',
            'link'      => 'required|max:50',
            'icon_menu' => 'max:100'
        ]);

        $parrent = Menu::where('id', $request->parrent)->value('nama_menu') ?? '';

        Menu::create([
            'nama_menu' => $request->nama_menu,
            'parrent'   => $request->parrent,
            'nama_parrent'   => $parrent ?? $request->nama_menu,
            'link'      => $request->link,
            'icon_menu' => $request->icon_menu,
            'urutan'    => $request->urutan,
        ]);

        Session::flash('success', 'Menu berhasil simpan');
        return redirect()->back();
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $menu = Menu::findOrFail($id);
        return response()->json($menu);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        // $menu = Menu::findOrFail($id);
        // return response()->json($menu);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $menu = Menu::findOrFail($id);

        $menu->nama_menu = $request->nama_menu;
        $menu->parrent = $request->parrent;
        $menu->nama_parrent = $request->nama_parrent ?? $request->nama_menu;
        $menu->link = $request->link;
        $menu->icon_menu = $request->icon_menu;
        $menu->urutan = $request->urutan;

        $menu->save();

        Session::flash('success', 'Menu berhasil di update');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);

        $menu->delete();

        Session::flash('success', 'Menu berhasil di hapus!');
        return redirect()->back();
    }

    public static function getParent($id_menu){     
        return Menu::get_parrent($id_menu);
    }

    public static function get_parrentall($id_menu){     
        return Menu::get_parrent_all($id_menu);
    }


    public function list_menu(){
        return view('menu::list_menu');
    }
}
