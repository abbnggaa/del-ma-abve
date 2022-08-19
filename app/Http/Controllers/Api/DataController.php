<?php

namespace App\Http\Controllers\Api;

use App\Models\DAta;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\DataResource;
use Illuminate\Support\Facades\Validator;

class DataController extends Controller
{
    public function index()
    {
        //get data
        $data = Data::latest()->paginate(5);

        //return collection of data as a resource
        return new DataResource(true, 'List Data Posts', $data);
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
        $data = Data::create([
            'user_id'     => $request->user_id,
            'suhu_tubuh'   => $request->suhu_tubuh,
        ]);

        //return response
        return new DataResource(true, 'Data Post Berhasil Ditambahkan!', $data);
    }

    public function show(Data $data)
    {
        //return single post as a resource
        return new DataResource(true, 'Data Post Ditemukan!', $data);
    }

    public function update(Request $request, Data $data)
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

        //update post without image
        $data->update([
            'user_id'     => $request->user_id,
            'suhu_tubuh'   => $request->suhu_tubuh,
        ]);

        //return response
        return new DataResource(true, 'Data Post Berhasil Diubah!', $data);
    }

    public function destroy(Data $data)
    {
        //delete post
        $data->delete();

        //return response
        return new DataResource(true, 'Data Post Berhasil Dihapus!', null);
    }

}
