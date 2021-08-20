<?php

namespace App\Http\Controllers;

use App\Models\Personalise;
use Illuminate\Http\Request;

class PersonalisesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personalises = Personalise::all();
        return view('admin.personalise.index', compact('personalises'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.personalise.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $personalise = new Personalise;
        $personalise->warna_banner_atas = $request->warna_banner_atas;
        $personalise->warna_background = $request->warna_background;
        $personalise->warna_banner_runningtext = $request->warna_banner_runningtext;
        $personalise->save();
        return redirect('/personalisasi')->with('success', 'Add Personalisasi Succesfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Personalise  $personalise
     * @return \Illuminate\Http\Response
     */
    public function show(Personalise $personalise)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Personalise  $personalise
     * @return \Illuminate\Http\Response
     */
    public function edit(Personalise $personalise, $id)
    {
        $personalises = Personalise::find($id);
        return view('admin.personalise.ubah', compact('personalises'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Personalise  $personalise
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $personalise = Personalise::find($id);
        $personalise->warna_banner_atas = $request->warna_banner_atas;
        $personalise->warna_background = $request->warna_background;
        $personalise->warna_banner_runningtext = $request->warna_banner_runningtext;

        $personalise->save();
        return redirect('/personalisasi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Personalise  $personalise
     * @return \Illuminate\Http\Response
     */
    public function destroy(Personalise $personalise, $id)
    {
        $data = Personalise::where('id', $id);
        $data->delete();
        return redirect('/personalisasi');
    }
}
