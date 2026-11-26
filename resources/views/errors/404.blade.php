@extends('layouts.app')

@section('title', 'Halaman Tidak Ditemukan — D-KREASI')

@section('content')
    <section class="section" aria-labelledby="not-found-title">
        <div class="section-heading">
            <span class="section-label purple-text">404</span>
            <h1 id="not-found-title">Halaman tidak ditemukan</h1>
            <p>Alamat yang Anda buka tidak tersedia atau mungkin sudah dipindahkan.</p>
            <a href="{{ route('home') }}" class="button button-gradient">Kembali ke D-KREASI <span>→</span></a>
        </div>
    </section>
@endsection
