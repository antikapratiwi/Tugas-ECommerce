@extends('layout.master')

@push('plugin-styles')
  {!! Html::style('/assets/plugins/plugin.css') !!} 
@endpush

@section('content')

<div class="row"> {{-- asdasd --}}
  <div class="col-lg-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <h3 class="font-weight-medium">Detail Unit</h3>
        <a href="/unit_index">
          <button type="button" class="btn btn-danger btn-sm mb-4"> Kembali </button>
        </a> 
        
        <div class="form-group">
          <h4 class="card-title">Nama Unit</h4>
          <div class="input-group">
            <input readonly type="text" placeholder="Nama Unit" class="form-control" id="nama" name="nama" value="{{ $data->nama }}">
          </div>
        </div>
        <div class="form-group">
          <h4 class="card-title">Alamat</h4>
          <div class="input-group">
            <input readonly type="text" placeholder="Alamat" class="form-control" id="alamat" name="alamat" value="{{ $data->alamat }}">
          </div>
        </div>
        <div class="form-group">
          <h4 class="card-title">Nama Pimpinan</h4>
          <div class="input-group">
            <input readonly type="text" placeholder="Nama Pimpinan" class="form-control" id="nama_pimpinan" name="nama_pimpinan" value="{{ $data->nama_pimpinan }}">
          </div>
        </div>
        <div class="form-group">
          <h4 class="card-title">NIP Pimpinan</h4>
          <div class="input-group">
            <input readonly type="text" placeholder="NIP Pimpinan" class="form-control" id="nip_pimpinan" name="nip_pimpinan" value={{ $data->nip_pimpinan }}>
          </div>
        </div>
        
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