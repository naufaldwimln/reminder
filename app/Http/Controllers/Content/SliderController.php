<?php

namespace App\Http\Controllers\Content;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Models\Slider;
use Session;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.content.slider')->with('data', Slider::paginate(10));
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
        $data = new Slider;

        $data->head = $request->head;
        $data->detail = $request->detail;
        $data->status = $request->status;
        $data->link = $request->link;

        $uploadedFile  = $request->file('picture');
        $file_up       = $uploadedFile->store('public/slider');
        $data->picture = \Storage::url($file_up);

        $data->save();

        Session::flash('success', 'Slider berhasil di Simpan');
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
        $slider = Slider::findOrFail($id);
        return response()->json($slider);
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
        $data = Slider::findOrFail($id);

        $data->head = $request->head;
        $data->detail = $request->detail;
        $data->status = $request->status;
        $data->link = $request->link;

        if ($request->hasFile('picture')) {
            $uploadedFile  = $request->file('picture');
            $file_up       = $uploadedFile->store('public/slider');
            $data->picture = \Storage::url($file_up);
        }

        $data->save();

        Session::flash('success', 'Slider berhasil di update');
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
        $data = Slider::findOrFail($id);
        $data->delete();

        Session::flash('success', 'Slider berhasil di hapus!');
        return redirect()->back();
    }
}
