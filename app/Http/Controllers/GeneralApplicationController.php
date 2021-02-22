<?php

namespace App\Http\Controllers;

use Session;
use App\Models\GeneralApp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GeneralApplicationController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
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
        return view('admin.general.index')->with('data', GeneralApp::first());
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
        $general                    = GeneralApp::first();
        $general->name              = $request->name_application;
        $general->facebook          = $request->facebook;
        $general->instagram         = $request->instagram;
        $general->twitter           = $request->twitter;
        $general->email             = $request->email;
        $general->phone             = $request->phone;
        $general->address           = $request->address;

        if ($request->hasFile('logo_ligth')) {
            $uploadedFile        = $request->file('logo_ligth');
            $file_up             = $uploadedFile->store('public/general_app');
            $general->logo_light = \Storage::url($file_up);
        }

        if ($request->hasFile('logo_dark')) {
            $uploadedFile       = $request->file('logo_dark');
            $file_up            = $uploadedFile->store('public/general_app');
            $general->logo_dark = \Storage::url($file_up);
        }

        if ($request->hasFile('icon')) {
            $uploadedFile  = $request->file('icon');
            $file_up       = $uploadedFile->store('public/general_app');
            $general->icon = \Storage::url($file_up);
        }

        $general->save();

        Session::flash('success', 'Setting Aplikasi berhasil simpan');
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
        //
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
