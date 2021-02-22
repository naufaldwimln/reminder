<?php

namespace App\Http\Controllers\Content;

use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\WorkDetail;

class WorkingDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.content.work')->with('data', WorkDetail::paginate(10));
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
        $data = new WorkDetail;
        $data->head = $request->head;
        $data->detail = $request->detail;
        $data->status = $request->status;

        $data->save();

        Session::flash('success', 'WorkDetail berhasil di Simpan');
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
        $data = WorkDetail::findOrFail($id);
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
        $data = WorkDetail::findOrFail($id);
        $data->head = $request->head;
        $data->detail = $request->detail;
        $data->status = $request->status;
        $data->save();

        Session::flash('success', 'WorkDetail berhasil di update');
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
        $data = WorkDetail::findOrFail($id);
        $data->delete();

        Session::flash('success', 'WorkDetail berhasil di hapus!');
        return redirect()->back();
    }
}
