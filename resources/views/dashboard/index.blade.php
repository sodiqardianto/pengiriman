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

<!-- ROW-1 -->
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xl-3">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="mt-2">
                                <h6 class="">Total Users</h6>
                                <h2 class="mb-0 number-font">44,278</h2>
                            </div>
                            <div class="ms-auto">
                                <div class="chart-wrapper mt-1">
                                    <canvas id="saleschart"
                                        class="h-8 w-9 chart-dropshadow"></canvas>
                                </div>
                            </div>
                        </div>
                        <span class="text-muted fs-12"><span class="text-secondary"><i
                                    class="fe fe-arrow-up-circle  text-secondary"></i> 5%</span>
                            Last week</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xl-3">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="mt-2">
                                <h6 class="">Total Profit</h6>
                                <h2 class="mb-0 number-font">67,987</h2>
                            </div>
                            <div class="ms-auto">
                                <div class="chart-wrapper mt-1">
                                    <canvas id="leadschart"
                                        class="h-8 w-9 chart-dropshadow"></canvas>
                                </div>
                            </div>
                        </div>
                        <span class="text-muted fs-12"><span class="text-pink"><i
                                    class="fe fe-arrow-down-circle text-pink"></i> 0.75%</span>
                            Last 6 days</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xl-3">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="mt-2">
                                <h6 class="">Total Expenses</h6>
                                <h2 class="mb-0 number-font">$76,965</h2>
                            </div>
                            <div class="ms-auto">
                                <div class="chart-wrapper mt-1">
                                    <canvas id="profitchart"
                                        class="h-8 w-9 chart-dropshadow"></canvas>
                                </div>
                            </div>
                        </div>
                        <span class="text-muted fs-12"><span class="text-green"><i
                                    class="fe fe-arrow-up-circle text-green"></i> 0.9%</span>
                            Last 9 days</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xl-3">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="mt-2">
                                <h6 class="">Total Cost</h6>
                                <h2 class="mb-0 number-font">$59,765</h2>
                            </div>
                            <div class="ms-auto">
                                <div class="chart-wrapper mt-1">
                                    <canvas id="costchart"
                                        class="h-8 w-9 chart-dropshadow"></canvas>
                                </div>
                            </div>
                        </div>
                        <span class="text-muted fs-12"><span class="text-warning"><i
                                    class="fe fe-arrow-up-circle text-warning"></i> 0.6%</span>
                            Last year</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ROW-1 END -->

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
                                    <option value="{{$item->village_id}}">{{ucwords($item->kelurahan->name)}} - {{ucwords($item->kelurahan->district->name)}}</option>
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
            data: {'id':kode},
            dataType: 'json',
            success: function(data) {
                // console.log(data);
                $('#harga25').val('RP. '+data.zona.harga25);
                $('#harga50').val('RP. '+data.zona.harga50);
                $('#harga100').val('RP. '+data.zona.harga100);
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