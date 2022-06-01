@extends('layouts.main')
@section('title', 'Tambah Kota')

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
    <div class="col-md-12 col-xl-10">
        <div class="card">
            <div class="card-body">
                <form class="form-horizontal" action="{{ route('storeCity') }}" method="POST">
                    @csrf
                    <div class="row mb-2">
                        <label for="provinsi" class="col-md-3 form-label">Nama Provinsi</label>
                        <div class="col-md-9">
                            <select class="form-control select2-show-search form-select @error('provinsi') is-invalid state-invalid @enderror" id="provinsi" name="provinsi" data-placeholder="Pilih Provinsi">
                                <option label="Choose one"></option>
                                @foreach ($provinsi as $item)
                                    <option value="{{$item->id}}">{{ucwords($item->name)}}</option>
                                @endforeach
                            </select>
                            @error('provinsi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="kabupaten" class="col-md-3 form-label">Nama Kota/Kabupaten</label>
                        <div class="col-md-9">
                            <select class="form-control select2-show-search form-select @error('kabupaten') is-invalid state-invalid @enderror" id="kabupaten" name="kabupaten" data-placeholder="Pilih Kota/Kabupaten"></select>
                            @error('kabupaten')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="kecamatan" class="col-md-3 form-label">Nama Kecamatan</label>
                        <div class="col-md-9">
                            <select class="form-control select2-show-search form-select @error('provinsi') is-invalid state-invalid @enderror" id="kecamatan" name="kecamatan" data-placeholder="Pilih Kecamatan"></select>
                            @error('kecamatan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="kelurahan" class="col-md-3 form-label">Nama Kelurahan</label>
                        <div class="col-md-9">
                            <select class="form-control select2-show-search form-select @error('kelurahan') is-invalid state-invalid @enderror" id="kelurahan" name="kelurahan" data-placeholder="Pilih Kelurahan"></select>
                            @error('kelurahan')
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
                                    <option value="{{$item->id}}">{{ucwords($item->zona)}}</option>
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
                            <input type="text" class="form-control @error('harga25') is-invalid state-invalid @enderror" id="harga25" name="harga25" placeholder="Rp. 0" value="{{ old('harga25') }}" readonly>
                            @error('harga25')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="harga50" class="col-md-3 form-label">50 %</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control @error('harga50') is-invalid state-invalid @enderror" id="harga50" name="harga50" placeholder="Rp. 0" value="{{ old('harga50') }}" readonly>
                            @error('harga50')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="harga100" class="col-md-3 form-label">100 %</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control @error('harga100') is-invalid state-invalid @enderror" id="harga100" name="harga100" placeholder="Rp. 0" value="{{ old('harga1Rp.  00') }}" readonly>
                            @error('harga100')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="km" class="col-md-3 form-label">Jarak KM</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control @error('km') is-invalid state-invalid @enderror" id="km" name="km" placeholder="Jarak Tempuh" value="{{ old('km') }}">
                            @error('km')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-0 mt-4 row justify-content-end">
                        <div class="col-md-9">
                            <button class="btn btn-primary">Tambah Kota</button>
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
                $('#harga25').val("Rp. " + data.harga25);
                $('#harga50').val("Rp. " + data.harga50);
                $('#harga100').val("Rp. " + data.harga100);
            },
            error: function(response) {
                alert(response.responseJSON.message);
            }
        })
    })
    </script>

    <script>
        $(function() {
            $.ajaxSetup({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
            })
        })

        $(function() {
            $('#provinsi').on('change', function() {
                let id_provinsi = $('#provinsi').val()

                $.ajax({
                    url: "{{ route('getKabupaten') }}",
                    type: "POST",
                    data: {id_provinsi:id_provinsi},
                    cache: false,
                    success: function(msg) {
                        $('#kabupaten').html(msg)
                    },
                    error: function(data) {
                        console.log('error:', data)
                    }
                })
            })

            $('#kabupaten').on('change', function() {
                let id_kabupaten = $('#kabupaten').val()

                $.ajax({
                    url: "{{ route('getKecamatan') }}",
                    type: "POST",
                    data: {id_kabupaten:id_kabupaten},
                    cache: false,
                    success: function(msg) {
                        $('#kecamatan').html(msg)
                    },
                    error: function(data) {
                        console.log('error:', data)
                    }
                })
            })

            $('#kecamatan').on('change', function() {
                let id_kecamatan = $('#kecamatan').val()

                $.ajax({
                    url: "{{ route('getKelurahan') }}",
                    type: "POST",
                    data: {id_kecamatan:id_kecamatan},
                    cache: false,
                    success: function(msg) {
                        $('#kelurahan').html(msg)
                    },
                    error: function(data) {
                        console.log('error:', data)
                    }
                })
            })
        })
    </script>
@endpush