@extends('layouts.admin')

@section('title', 'Data Keterangan')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">

                <div class="col-md-1">
                    <a href="{{ url('keterangan/create') }}" class="btn btn-primary mb-3"><i class="fas fa-plus"></i></a>
                </div>

                @if(Session::has('success'))
                    <p class="alert alert-success">{{ Session::get('success') }}</p>
                @endif

                <div class="card">
                    <div class="card-body">
                        <table class="table mb-4">
                            <thead>
                              <tr>
                                <th scope="col">id</th>
                                <th scope="col">tanggal</th>
                                <th scope="col">Waktu</th>
                                <th scope="col">Lokasi</th>
                                <th scope="col">Suhu Tubuh</th>
                                <th scope="col" colspan="2">Option</th>
                              </tr>
                            </thead>
                            <tbody>
                            @foreach ($data as $item => $dt)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $dt->tanggal }}</td>
                                    <td>{{ $dt->waktu }}</td>
                                    <td>{{ $dt->lokasi }}</td>
                                    <td>{{ $dt->suhu_tubuh }}</td>
                                    <td><a href="{{ url('keterangan/'.$dt->id.'/edit') }}" type="button" class="btn btn-warning"><i class="fas fa-pen"></a></td>
                                    <td>
                                        <form action="{{ url('keterangan/'.$dt->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr> 
                            @endforeach
                            </tbody> 
                        </table>
                        {{ $data->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection