@extends('layout.master')

@push('plugin-styles')
  {!! Html::style('/assets/plugins/plugin.css') !!} 
@endpush

@section('content')

<div class="row"> {{-- asdasd --}}
  <div class="col-lg-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <h3 class="font-weight-medium">Edit Periode</h3>
        <a href="/periode_index">
          <button type="button" class="btn btn-danger btn-sm mb-4"> Kembali </button>
        </a> 
        <form method="post" enctype="multipart/form-data" action="/periode_update/{{ $data->id }}">
          {{-- @method("put") --}}
          @csrf
          <div class="form-group">
            <h4 class="card-title">Nama Periode</h4>
            <div class="input-group">
              <input type="text" placeholder="Nama Periode" class="form-control" id="nama" name="nama" value="{{ $data->nama }}">
            </div>
          </div>
          <div class="form-group">
            <h4 class="card-title">Tanggal Mulai</h4>
            <div class="input-group">
              <input type="date" class="form-control" id="tgl_mulai" name="tgl_mulai" value="{{ $data->tgl_mulai }}">
            </div>
          </div>
          <div class="form-group">
            <h4 class="card-title">Tanggal Selesai</h4>
            <div class="input-group">
              <input type="date" class="form-control" id="tgl_selesai" name="tgl_selesai" value="{{ $data->tgl_selesai }}">
            </div>
          </div>
          <div class="form-group">
            <h4 class="card-title">Nomor SK</h4>
            <div class="input-group">
              <input type="text" placeholder="Nomor SK" class="form-control" id="no_sk" name="no_sk" value="{{ $data->no_sk }}">
            </div>
          </div>
          <div class="form-group">
            <h4 class="card-title">Tanggal SK</h4>
            <div class="input-group">
              <input type="date" class="form-control" id="tgl_sk" name="tgl_sk" value="{{ $data->tgl_sk }}">
            </div>
          </div>
          <div class="form-group">
            <h4 class="card-title">File SK</h4>
            <div class="input-group">
              <input type="file" placeholder="File SK" id="file_sk" name="file_sk" value="{{ $data->file_sk }}">
            </div>
          </div>
          <div class="form-group">
            <h4 class="card-title">Nama Ketua SPI</h4>
            <div class="input-group">
              <input type="text" placeholder="Nama Ketua SPI" class="form-control" id="nama_ketua_spi" name="nama_ketua_spi" value="{{ $data->nama_ketua_spi }}">
            </div>
          </div>
          <div class="form-group">
            <h4 class="card-title">NIP Ketua SPI</h4>
            <div class="input-group">
              <input type="text" placeholder="NIP Ketua SPI" class="form-control" id="nip_ketua_spi" name="nip_ketua_spi" value="{{ $data->nip_ketua_spi }}">
            </div>
          </div>
          <button type="submit" class="btn btn-primary btn-sm"> Submit </button>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection

@push('plugin-scripts')
  {!! Html::script('/assets/plugins/chartjs/chart.min.js') !!}
  {!! Html::script('/assets/plugins/jquery-sparkline/jquery.sparkline.min.js') !!}
@endpush --}}

@push('custom-scripts')
  {!! Html::script('/assets/js/dashboard.js') !!}
@endpush