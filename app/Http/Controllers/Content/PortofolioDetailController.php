<?php

namespace App\Http\Controllers\Content;

use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Models\PortofolioDetail;

class PortofolioDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.content.client')->with('data', PortofolioDetail::paginate(10));
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
        $data = new PortofolioDetail;
        $data->status = $request->status;

        $uploadedFile  = $request->file('picture');
        $file_up       = $uploadedFile->store('public/portofolio');
        $data->picture = \Storage::url($file_up);

        $data->save();

        Session::flash('success', 'PortofolioDetail berhasil di Simpan');
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
        $data = PortofolioDetail::findOrFail($id);
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
        $data = PortofolioDetail::findOrFail($id);
        $data->status = $request->status;

        if ($request->hasFile('picture')) {
            $uploadedFile  = $request->file('picture');
            $file_up       = $uploadedFile->store('public/portofolio');
            $data->picture = \Storage::url($file_up);
        }

        $data->save();

        Session::flash('success', 'PortofolioDetail berhasil di update');
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
        $data = PortofolioDetail::findOrFail($id);
        $data->delete();

        Session::flash('success', 'PortofolioDetail berhasil di hapus!');
        return redirect()->back();
    }
}
