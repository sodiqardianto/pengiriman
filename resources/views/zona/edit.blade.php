@extends('layouts.main')
@section('title', 'Edit Zona')

@section('content')

<!-- PAGE-HEADER -->
<div class="page-header">
    <h1 class="page-title">@yield('title')</h1>
    <div>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="/zona">Zona</a></li>
            <li class="breadcrumb-item active" aria-current="page">@yield('title')</li>
        </ol>
    </div>
</div>
<!-- PAGE-HEADER END -->

<div class="row">
    <div class="col-md-12 col-xl-6">
        <div class="card">
            <div class="card-body">
                <form class="form-horizontal" action="{{ route('updateZona', $zona->id) }}" method="POST">
                    @method('patch')
                    @csrf
                    <div class=" row mb-2">
                        <label for="inputName" class="col-md-3 form-label">Nama Zona</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control @error('name') is-invalid state-invalid @enderror" id="inputName" name="zona" placeholder="Nama Zona" value="{{ old('zona',ucwords($zona->zona)) }}">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="harga25" class="col-md-3 form-label">25 %</label>
                        <div class="col-md-9">
                            <input type="number" class="form-control @error('harga25') is-invalid state-invalid @enderror" id="harga25" name="harga25" placeholder="0" value="{{ old('harga25',$zona->harga25) }}">
                            @error('harga25')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="harga50" class="col-md-3 form-label">50 %</label>
                        <div class="col-md-9">
                            <input type="number" class="form-control @error('harga50') is-invalid state-invalid @enderror" id="harga50" name="harga50" placeholder="0" value="{{ old('harga50',$zona->harga50) }}">
                            @error('harga50')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="harga100" class="col-md-3 form-label">100 %</label>
                        <div class="col-md-9">
                            <input type="number" class="form-control @error('harga100') is-invalid state-invalid @enderror" id="harga100" name="harga100" placeholder="0" value="{{ old('harga100',$zona->harga100) }}">
                            @error('harga100')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="km" class="col-md-3 form-label">Jarak KM</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control @error('km') is-invalid state-invalid @enderror" id="km" name="km" placeholder="Jarak Tempuh" value="{{ old('km',ucwords($zona->km)) }}">
                            @error('km')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-0 mt-4 row justify-content-end">
                        <div class="col-md-9">
                            <button class="btn btn-primary">Edit Zona</button>
                            <a href="/zona" class="btn btn-secondary">Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection