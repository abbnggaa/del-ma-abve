<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\CatatanPerjalananResource;
use App\Http\Controllers\Controller;
use App\Models\CatatanPerjalanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CatatanPerjalananController extends Controller
{
    public function index()
    {
        //get posts
        $catatanperjalanan = CatatanPerjalanan::latest()->paginate(5);

        //return collection of posts as a resource
        return new CatatanPerjalananResource(true, 'List Data Posts', $catatanperjalanan);
    }

    public function store(Request $request)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'user_id'     => 'required',
            'suhu_tubuh'   => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //create post
        $catatanperjalanan = CatatanPerjalanan::create([
            'user_id'     => $request->user_id,
            'suhu_tubuh'   => $request->suhu_tubuh,
        ]);

        //return response
        return new CatatanPerjalananResource(true, 'Data Post Berhasil Ditambahkan!', $catatanperjalanan);
    }

    public function show(CatatanPerjalanan $catatanperjalanan)
    {
        //return single post as a resource
        return new CatatanPerjalananResource(true, 'Data Post Ditemukan!', $catatanperjalanan);
    }

    public function update(Request $request, CatatanPerjalanan $catatanperjalanan)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'user_id'     => 'required',
            'suhu_tubuh'   => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $catatanperjalanan->update([
            'user_id'     => $request->user_id,
            'suhu_tubuh'   => $request->suhu_tubuh,
        ]);

        //return response
        return new CatatanPerjalananResource(true, 'Data Post Berhasil Diubah!', $catatanperjalanan);
    }

    public function destroy(CatatanPerjalanan $catatanperjalanan)
    {
        //delete post
        $catatanperjalanan->delete();

        //return response
        return new CatatanPerjalananResource(true, 'Data Post Berhasil Dihapus!', null);
    }
}
