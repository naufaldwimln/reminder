<?php

namespace App\Http\Controllers\Gudang;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\JenisProduct;
use Session;

class JenisProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.gudang.jenis_product')->with('data', JenisProduct::paginate(10));
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
        $data = new JenisProduct;
        $data->name = $request->name;

        if ($request->hasFile('icon')) {
            $uploadedFile  = $request->file('icon');
            $file_up       = $uploadedFile->store('public/jenis_product');
            $data->icon = \Storage::url($file_up);
        }

        $data->save();

        Session::flash('success', 'JenisProduct berhasil di Simpan');
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
        $data = JenisProduct::findOrFail($id);
        return response()->json($data);
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
        $data = JenisProduct::find($id);
        $data->name = $request->name;
        if ($request->hasFile('icon')) {
            $uploadedFile  = $request->file('icon');
            $file_up       = $uploadedFile->store('public/jenis_product');
            $data->icon = \Storage::url($file_up);
        }

        $data->save();
        Session::flash('success', 'JenisProduct berhasil di rubah');
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
        $data = JenisProduct::findOrFail($id);
        $data->delete();

        Session::flash('success', 'JenisProduct berhasil di hapus!');
        return redirect()->back();
    }
}
