@extends('layouts.app')

@section('title', 'Status Layanan — D-KREASI')

@section('meta_description', 'Status akses layanan D-KREASI, D-Karsa, dan Webia.')

@section('content')
    <section class="section" aria-labelledby="status-title">
        <div class="section-heading">
            <span class="section-label cyan-text">STATUS LAYANAN</span>
            <h1 id="status-title">Akses layanan D-KREASI</h1>
            <p>Pilih layanan yang ingin Anda gunakan. Jika salah satu layanan sedang dalam pemeliharaan, silakan coba kembali beberapa saat lagi.</p>
        </div>
        <div class="service-grid">
            <article class="service-card invitation">
                <h2>D'Karsa</h2>
                <p>Undangan digital untuk berbagai momen dan acara.</p>
                <a class="service-button" href="{{ rtrim(config('services.dkarsa.url'), '/') }}">Buka D'Karsa →</a>
            </article>
            <article class="service-card business">
                <h2>Webia</h2>
                <p>Website bisnis dan solusi digital untuk usaha Anda.</p>
                <a class="service-button" href="{{ rtrim(config('services.webia.url'), '/') }}">Buka Webia →</a>
            </article>
        </div>
    </section>
@endsection
