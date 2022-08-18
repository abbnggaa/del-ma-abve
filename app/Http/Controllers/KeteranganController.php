<?php

namespace App\Http\Controllers;

use App\Models\Keterangan;
use Illuminate\Http\Request;
use App\Http\Resources\KeteranganResource;
use App\Http\Requests\KeteranganRequest;

class KeteranganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        $data = Keterangan::latest()->orWhere('tanggal', 'LIKE', '%'.$keyword.'%')->orWhere('waktu', 'LIKE', '%'.$keyword.'%')->orWhere('lokasi', 'LIKE', '%'.$keyword.'%')->orWhere('suhu_tubuh', 'LIKE', '%'.$keyword.'%')->simplepaginate(5);
        return view('keterangan.data', compact('data', 'keyword'));

        return new KeteranganResource(true, 'List Data Keterangan', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = new Keterangan;
        return view('Keterangan.tambah', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KeteranganRequest $request)
    {
        $data = new Keterangan;
        $data->tanggal = $request->tanggal;
        $data->waktu = $request->waktu;
        $data->lokasi = $request->lokasi;
        $data->suhu_tubuh = $request->suhu_tubuh;
        $data->save();

        return redirect('keterangan')->with('success', 'Data berhasil di tambahkan');
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
        return view('keterangan.edit', compact('data'));
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

        return redirect('keterangan')->with('success', 'Data berhasil di update');
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

        return redirect('keterangan')->with('success', 'Data berhasil didelete');
    }
}
