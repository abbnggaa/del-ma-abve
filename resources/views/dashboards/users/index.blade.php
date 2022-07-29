@extends('layouts.user')

@section('title', 'Home')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Selamat Datang ') }}{{ Auth::user()->name }}.{{ __(' Del Ma Abve adalah aplikasi yang dikembangkan untuk membantu instansi pemerintah terkait dalam melakukan pelacakan untuk menghentikan penyebaran Coronavirus Disease. Aplikasi ini mengandalkan partisipasi masyarakat untuk saling membagikan data lokasinya saat bepergian agar penelusuran riwayat kontak dengan penderita COVID-19 dapat dilakukan.') }}
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="col-md-8">
                <a href="{{ url('keterangan/create') }}" class="btn btn-primary mb-3">Isi Catatan Perjalanan</a>
            </div>
        </div>
    </div>
</div>
@endsection
