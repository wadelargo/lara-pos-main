@extends('layout')

@php
    use SimpleSoftwareIO\QrCode\Facades\QrCode;
@endphp

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <a href="/products/pdf" class="btn btn-primary export-btn">Export to PDF</a>
        </div>
    </div>
    <div class="row mt-4">
        @foreach($products as $product)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body text-center">
                        {!! QrCode::size(100)->generate(Request::url() . '/products/' . $product->id) !!}
                        <p class="card-text mt-2">Product ID: {{ $product->id }}</p>
                        <h3 class="card-title">{{ $product->name }}</h3>
                        <h2 class="text-danger card-text">${{ number_format($product->price, 2) }}</h2>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection

@push('styles')
<style>
    .export-btn {
        background-color: #28a745;
        color: #fff;
    }
    .card-title {
        font-weight: 50;
    }
</style>
@endpush
