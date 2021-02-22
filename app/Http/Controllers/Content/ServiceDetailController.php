<?php

namespace App\Http\Controllers\Content;

use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ServicesDetail;

class ServiceDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.content.service')->with('data', ServicesDetail::paginate(10));
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
        $data = new ServicesDetail;
        $data->head = $request->head;
        $data->detail = $request->detail;
        $data->icon = $request->icon;

        $data->save();

        Session::flash('success', 'ServicesDetail berhasil di Simpan');
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
        $data = ServicesDetail::findOrFail($id);
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
        $data = ServicesDetail::findOrFail($id);
        $data->head = $request->head;
        $data->detail = $request->detail;
        $data->icon = $request->icon;
        $data->save();

        Session::flash('success', 'ServicesDetail berhasil di update');
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
        $data = ServicesDetail::findOrFail($id);
        $data->delete();

        Session::flash('success', 'ServicesDetail berhasil di hapus!');
        return redirect()->back();
    }
}
