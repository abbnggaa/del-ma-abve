<?php

namespace App\Http\Controllers;

use App\Models\Keterangan;
use Illuminate\Http\Request;
use App\Http\Requests\KeteranganRequest;

class DataKeteranganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        $data = Keterangan::latest()->orWhere('tanggal', 'LIKE', '%'.$keyword.'%')->orWhere('lokasi', 'LIKE', '%'.$keyword.'%')->simplepaginate(4);
        return view('keterangan.data', compact('data', 'keyword'));
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
        // 
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
        $data = Keterangan::findorfail($id);
        return view('dataketerangan.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(KeteranganRequest $request, $id)
    {
        $data = Keterangan::findorfail($id);
        $data->tanggal = $request->tanggal;
        $data->waktu = $request->waktu;
        $data->lokasi = $request->lokasi;
        $data->suhu_tubuh = $request->suhu_tubuh;
        $data->save();

        return redirect('dataketerangan')->with('success', 'Data berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Keterangan::findorfail($id);
        $data->delete();

        return redirect('dataketerangan')->with('success', 'Data berhasil didelete');
    }
}
