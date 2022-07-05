@extends('layouts.main')
@section('title', 'Tambah Transaksi')

@section('content')

<!-- PAGE-HEADER -->
<div class="page-header">
    <h1 class="page-title">@yield('title')</h1>
    <div>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="/transaction">Transaksi</a></li>
            <li class="breadcrumb-item active" aria-current="page">@yield('title')</li>
        </ol>
    </div>
</div>
<!-- PAGE-HEADER END -->

<form class="form-horizontal" action="{{ route('storeTransaction') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-md-12 col-xl-6">
            <div class="card">
                <div class="card-body">
                <div class=" row mb-2">
                        <label for="no_telp" class="col-md-4 form-label">No. Telepon</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control @error('no_telp') is-invalid state-invalid @enderror" id="no_telp" name="no_telp" placeholder="No. Telepon" value="{{ old('no_telp') }}">
                            @error('no_telp')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-1">
                        <button type="button" name='check' id='check' class="btn btn-success">Check</button>
                        </div>
                    </div>
                    <div class=" row mb-2">
                        <label for="inputName" class="col-md-4 form-label">Nama Customer</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control @error('name') is-invalid state-invalid @enderror" id="name" name="name" placeholder="Nama Customer" value="{{ old('name') }}">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <!-- <div class="row mb-2">
                        <div class="col-md-4">
                            <label for="kecamatan" class="form-label">Pilih Kecamatan</label>
                        </div>
                        <div class="col-md-8">
                            <select class="form-control select2-show-search form-select" id="kecamatan" name="kecamatan" data-placeholder="Pilih Kecamatan">
                                <option value="" selected disabled>Pilih Kecamatan</option>
                                @foreach ($kelurahan as $item)
                                    <option value="{{$item->id}}">{{ucwords($item->kelurahan->name)}} - {{ucwords($item->kelurahan->district->name)}}</option>
                                @endforeach
                            </select> 
                        </div>
                    </div> -->
                    <div class="row mb-2">
                        <div class="col-md-4">
                            <label for="kelurahan" class="form-label">Pilih Kelurahan</label>
                        </div>
                        <div class="col-md-8">
                            <select class="form-control select2-show-search form-select" id="kelurahan" name="kelurahan" data-placeholder="Pilih Kelurahan">
                                <option value="" selected disabled>Pilih Kelurahan</option>
                                @foreach ($kelurahan as $item)
                                    <option value="{{$item->id}}">{{ucwords($item->kelurahan->name)}} - {{ucwords($item->kelurahan->district->name)}}</option>
                                @endforeach
                            </select> 
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <label for="harga25" class="form-label">25 %</label>
                            <input type="text" class="form-control" id="harga25" name="harga25" placeholder="0" readonly>
                        </div>
                        <div class="col-sm-4">
                            <label for="harga50" class="form-label">50 %</label>
                            <input type="text" class="form-control" id="harga50" name="harga50" placeholder="0" readonly>
                        </div>
                        <div class="col-sm-4">
                            <label for="harga100" class="form-label">100 %</label>
                            <input type="text" class="form-control" id="harga100" name="harga100" placeholder="0" readonly>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">Tambah</button>
                                <a href="/transaction" class="btn btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-xl-6">
            <div class="card">
                <div class="card-body" id="dynamic_field">
                    <div class="row">
                        <div class="mb-2 col-md-2">
                            <label class="form-label">Mobil 1</label>
                        </div>
                        <div class="col-md-8">
                            <select name="mobil[]" class="form-control form-select select2" required>
                                <option value=""selected disabled>-- Pilih Persentase --</option>
                                <option value="100">100 %</option>
                                <option value="50">50 %</option>
                                <option value="25">25 %</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-success" id="add"><i class="fa fa-plus"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection

@push('after-script')
    <!-- INTERNAL SELECT2 JS -->
    <script src="{{ asset('/assets/plugins/select2/select2.full.min.js') }}"></script>
    <script src="{{ asset('/assets/js/select2.js') }}"></script>
    <script>
    $('#kelurahan').change(function() {
        var kode = $('#kelurahan').val();
        $.ajax({
            type: "GET",
            url: "{{ route('priceCity') }}",
            data: {'id':kode},
            dataType: 'json',
            success: function(data) {
                // console.log(data);
                $('#harga25').val("Rp. " + data.zona.harga25);
                $('#harga50').val("Rp. " + data.zona.harga50);
                $('#harga100').val("Rp. " + data.zona.harga100);
            },
            error: function(response) {
                alert(response.responseJSON.message);
            }
        })
    })
    </script> 

    <script>
        $(document).ready(function(){
            var maxRow = 7;
            var i =1;
            var urut = 2;
            $('#add').click(function(){
                // i++;
                html = "";
                html +=
                `
                <div class="row" id="mobil`+ i +`">
                    <div class="mb-2 col-md-2">
                        <label class="form-label">Mobil `+ urut +`</label>
                    </div>
                    <div class="col-md-8">
                        <select name="mobil[]" class="form-control form-select select2" required>
                            <option value="" selected disabled>-- Pilih Persentase --</option>
                            <option value="100">100 %</option>
                            <option value="50">50 %</option>
                            <option value="25">25 %</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-danger remove" id="` + i + `"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                `
                if (i <= maxRow) {
                    $('#dynamic_field').append(html);
                    i++;
                }
                urut++;
            });

            $(document).on('click', '.remove', function() {
                var button_id = $(this).attr("id");
                $('#mobil' + button_id + '').remove();
                i--;
            });

            $('#remove').click(function(){  
                alert('oke')
                // var button_id = $(this).attr("id");   
                // alert(button_id)
                // $('#num'+button_id+'').remove();  
            });  
        })

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
            $('#check').click(function(){
                var kode = $('#no_telp').val();
                $.ajax({
                    type: "GET",
                    url: "{{ route('check') }}",
                    data: {'id':kode},
                    dataType: 'json',
                    success: function(data) {
                        // console.log(data);
                        $('#name').val(data.nama);
                        $('#kelurahan').val(data.city_id).trigger('change');
                        // $('#harga50').val("Rp. " + data.zona.harga50);
                        // $('#harga100').val("Rp. " + data.zona.harga100);
                    },
                    error: function(response) {
                        toastr.error("Masukan Nomor Telepon/Nomor Telepon Belum Pernah Melakukan Transaksi");
                    }
                })
            })
        })
    </script>
@endpush