<?php

namespace App\Http\Controllers\Content;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Models\Clients;
use Session;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.content.client')->with('data', Clients::paginate(10));
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
        $data = new Clients;
        $data->status = $request->status;

        $uploadedFile  = $request->file('picture');
        $file_up       = $uploadedFile->store('public/client');
        $data->picture = \Storage::url($file_up);

        $data->save();

        Session::flash('success', 'Client berhasil di Simpan');
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
        $data = Clients::findOrFail($id);
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
        $data = Clients::findOrFail($id);
        $data->status = $request->status;

        if ($request->hasFile('picture')) {
            $uploadedFile  = $request->file('picture');
            $file_up       = $uploadedFile->store('public/client');
            $data->picture = \Storage::url($file_up);
        }

        $data->save();

        Session::flash('success', 'Client berhasil di update');
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
        $data = Clients::findOrFail($id);
        $data->delete();

        Session::flash('success', 'Client berhasil di hapus!');
        return redirect()->back();
    }
}
