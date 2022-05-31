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

<div class="row">
    <div class="col-md-12 col-xl-6">
        <div class="card">
            <div class="card-body">
                <form class="form-horizontal" action="{{ route('storeTransaction') }}" method="POST">
                    @csrf
                    <div class=" row mb-4">
                        <label for="inputName" class="col-md-4 form-label">Nama Customer</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control @error('name') is-invalid state-invalid @enderror" id="inputName" name="name" placeholder="Nama Customer" value="{{ old('name') }}">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class=" row mb-2">                       
                        <label for="zona" class="col-md-4 form-label">Pilih Kota</label>
                        <div class="col-md-8">
                            <select class="form-control select2-show-search form-select" id="kota" name="kota" data-placeholder="Choose one">
                                <option label="Choose one"></option>
                                @foreach ($city as $item)
                                    <option value="{{$item->id}}">{{ucwords($item->kota)}}</option>
                                @endforeach
                            </select> 
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror 
                        </div>
                        
                    </div>
                    <div class="mb-0 mt-4 row justify-content-end">
                        <div class="col-md-8">
                            <button type="submit" class="btn btn-primary">Tambah</button>
                            <a href="/transaction" class="btn btn-secondary">Kembali</a>
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
    {{-- <script type="text/javascript">
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
    </script> --}}

    @endpush