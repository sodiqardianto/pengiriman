@extends('layouts.main')
@section('title', 'Edit Kota')

@section('content')

<!-- PAGE-HEADER -->
<div class="page-header">
    <h1 class="page-title">@yield('title')</h1>
    <div>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="/city">Kota</a></li>
            <li class="breadcrumb-item active" aria-current="page">@yield('title')</li>
        </ol>
    </div>
</div>
<!-- PAGE-HEADER END -->

<div class="row">
    <div class="col-md-12 col-xl-6">
        <div class="card">
            <div class="card-body">
                <form class="form-horizontal" action="{{ route('updateCity', $city->id) }}" method="POST">
                    @method('patch')
                    @csrf
                    <div class="row mb-2">
                        <label for="kota" class="col-md-3 form-label">Nama Kota</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control @error('kota') is-invalid state-invalid @enderror" id="kota" name="kota" placeholder="Masukan Nama Kota" value="{{ old('kota',ucwords($city->kota)) }}">
                            @error('kota')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class=" row mb-2">                       
                        <label for="zona" class="col-md-3 form-label">Pilih Zona</label>
                        <div class="col-md-9">
                            <select class="form-control select2-show-search form-select @error('name') is-invalid state-invalid @enderror" id="zona" name="zona" data-placeholder="Choose one">
                                <option label="Choose one"></option>
                                @foreach ($zona as $item)
                                    <option value="{{$item->id}}" {{$city->id==$item->id?'selected':''}}>{{ucwords($item->zona)}}</option>
                                @endforeach
                            </select>
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror 
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="harga25" class="col-md-3 form-label">25 %</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control @error('harga25') is-invalid state-invalid @enderror" id="harga25" name="harga25" placeholder="0" value="{{ old('harga25',$hargaZona->harga25) }}" readonly>
                            @error('harga25')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="harga50" class="col-md-3 form-label">50 %</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control @error('harga50') is-invalid state-invalid @enderror" id="harga50" name="harga50" placeholder="0" value="{{ old('harga50',$hargaZona->harga50) }}" readonly>
                            @error('harga50')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="harga100" class="col-md-3 form-label">100 %</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control @error('harga100') is-invalid state-invalid @enderror" id="harga100" name="harga100" placeholder="0" value="{{ old('harga100',$hargaZona->harga100) }}" readonly>
                            @error('harga100')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="km" class="col-md-3 form-label">Jarak KM</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control @error('km') is-invalid state-invalid @enderror" id="km" name="km" placeholder="Jarak Tempuh" value="{{ old('km',$city->km) }}">
                            @error('km')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="mb-0 mt-4 row justify-content-end">
                        <div class="col-md-9">
                            <button class="btn btn-primary">Edit Kota</button>
                            <a href="/city" class="btn btn-secondary">Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('after-script')
    <!-- INTERNAL SELECT2 JS -->
    <script src="{{ asset('/assets/plugins/select2/select2.full.min.js') }}"></script>
    <script src="{{ asset('/assets/js/select2.js') }}"></script>
    <script type="text/javascript">
    $('#zona').change(function() {
        var kode = $('#zona').val();
        $.ajax({
            type: "GET",
            url: "{{ route('price') }}",
            data: {'id':kode},
            dataType: 'json',
            success: function(data) {
                // console.log(data);
                $('#harga25').val("Rp. "+data.harga25);
                $('#harga50').val("Rp. "+data.harga50);
                $('#harga75').val("Rp. "+data.harga75);
            },
            error: function(response) {
                alert(response.responseJSON.message);
            }
        })
    })
    </script>

    @endpush