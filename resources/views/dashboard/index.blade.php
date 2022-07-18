@extends('layouts.main')
@section('title', 'Dashboard')

@section('content')

<!-- PAGE-HEADER -->
<div class="page-header">
    <h1 class="page-title">@yield('title')</h1>
    <div>
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">@yield('title')</li>
        </ol>
    </div>
</div>
<!-- PAGE-HEADER END -->

<div class="row">
    <div class="col-sm-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title mb-0">Cek Ongkir</h3>
            </div>
            <div class="card-body pt-4">
                <div class="grid-margin">
                    <div class="row">
                        <div class="col-sm-12">
                            <label for="kelurahan" class="form-label">Pilih Kelurahan</label>
                            <select class="form-control select2-show-search form-select" id="kelurahan" name="kelurahan" data-placeholder="Pilih kelurahan">
                                <option value="" selected disabled>Pilih Kelurahan</option>
                                @foreach ($kelurahan as $item)
                                <option value="{{$item->id}}">{{ucwords($item->kelurahan->name)}} - {{ucwords($item->kelurahan->district->name)}}</option>
                                @endforeach
                            </select>
                        </div>
                        {{-- <div class="col-sm-12">
                            <label for="kabupaten" class="form-label">Pilih Kota/Kabupaten</label>
                            <select class="form-control select2-show-search form-select" id="kabupaten" name="kabupaten" data-placeholder="Choose one"></select> 
                        </div>
                        <div class="col-sm-12">
                            <label for="kecamatan" class="form-label">Pilih Kecamatan</label>
                            <select class="form-control select2-show-search form-select" id="kecamatan" name="kecamatan" data-placeholder="Choose one"></select> 
                        </div>
                        <div class="col-sm-12">
                            <label for="kelurahan" class="form-label">Pilih Kelurahan</label>
                            <select class="form-control select2-show-search form-select" id="kelurahan" name="kelurahan" data-placeholder="Choose one"></select> 
                        </div> --}}
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <label for="harga25" class="form-label">25 %</label>
                            <input type="text" class="form-control" id="harga25" name="harga25" placeholder="Rp. -" readonly>
                        </div>
                        <div class="col-sm-4">
                            <label for="harga50" class="form-label">50 %</label>
                            <input type="text" class="form-control" id="harga50" name="harga50" placeholder="Rp. -" readonly>
                        </div>
                        <div class="col-sm-4">
                            <label for="harga100" class="form-label">100 %</label>
                            <input type="text" class="form-control" id="harga100" name="harga100" placeholder="Rp. -" readonly>
                        </div>
                    </div>
                </div>
            </div>
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
    $('#kelurahan').change(function() {
        var kode = $('#kelurahan').val();
        $.ajax({
            type: "GET",
            url: "{{ route('priceCity') }}",
            data: {
                'id': kode
            },
            dataType: 'json',
            success: function(data) {
                // console.log(data);
                $('#harga25').val('Rp. ' + data.zona.harga25);
                $('#harga50').val('Rp. ' + data.zona.harga50);
                $('#harga100').val('Rp. ' + data.zona.harga100);
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
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
    })

    $(function() {
        $('#provinsi').on('change', function() {
            let id_provinsi = $('#provinsi').val()

            $.ajax({
                url: "{{ route('getKabupaten') }}",
                type: "POST",
                data: {
                    id_provinsi: id_provinsi
                },
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
                data: {
                    id_kabupaten: id_kabupaten
                },
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
                data: {
                    id_kecamatan: id_kecamatan
                },
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