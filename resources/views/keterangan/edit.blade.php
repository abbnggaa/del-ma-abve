@extends('layouts.admin') 
 
@section('title', 'Edit Data Keterangan') 
 
@section('content') 
    <div class="container"> 
        <div class="row justify-content-center"> 
            <div class="col-md-8"> 
                <div class="card"> 
                    <div class="card-body"> 
                        <form method="POST" action="{{ url('keterangan/'.$data->id) }}"> 
                            @csrf 
                            @method('PUT') 
 
                            <div class="mb-2"> 
                              <label class="form-label">Tanggal</label> 
                              <input type="date" class="form-control" name="tanggal" value="{{ $data->tanggal }}"> 
                              @foreach ($errors->get('tanggal') as $message) 
                                  <p class="text-warning">{{ $message }}</p> 
                              @endforeach 
                            </div> 
                            <div class="mb-2"> 
                              <label class="form-label">Waktu</label> 
                              <input type="time" class="form-control" name="waktu" value="{{ $data->waktu }}"> 
                              @foreach ($errors->get('waktu') as $message) 
                                  <p class="text-warning">{{ $message }}</p> 
                              @endforeach 
                            </div> 
                            <div class="mb-2"> 
                                <label class="form-label">Lokasi</label> 
                                <input type="text" class="form-control" name="lokasi" value="{{ $data->lokasi }}"> 
                                @foreach ($errors->get('lokasi') as $message) 
                                    <p class="text-warning">{{ $message }}</p> 
                                @endforeach 
                            </div>
                            <div class="mb-2"> 
                                <label class="form-label">Suhu TUbuh</label> 
                                <input type="text" class="form-control" name="suhu_tubuh" value="{{ $data->suhu_tubuh }}"> 
                                @foreach ($errors->get('suhu_tubuh') as $message) 
                                    <p class="text-warning">{{ $message }}</p> 
                                @endforeach 
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button> 
                        </form> 
                    </div> 
                </div> 
            </div> 
        </div> 
    </div> 
@endsection