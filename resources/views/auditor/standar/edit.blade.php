@extends('layout.master')

@push('plugin-styles')
  {!! Html::style('/assets/plugins/plugin.css') !!} 
@endpush

@section('content')

<div class="row"> {{-- asdasd --}}
  <div class="col-lg-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <h3 class="font-weight-medium">Edit Standar</h3>
        <a href="{{ route('auditor.standar.index') }}">
          <button type="button" class="btn btn-danger btn-sm mb-4"> Kembali </button>
        </a> 
        
        <form action="{{ route('auditor.standar.update', $data) }}" method="post">
            @csrf
            @method('PUT')
                <div class="form-group">
                    <h4 class="card-title">Nama</h4>
                    <div class="input-group">
                    <input  type="text" placeholder="Nama Unit" class="form-control" id="nama" name="nama" value="{{ $data->nama }}">
                    </div>
                </div>
              <div class="form-group">
                <h4 class="card-title">Deskripsi</h4>
                <div class="input-group">
                  <textarea type="text" placeholder="Deskripsi" name="deskripsi" class="form-control">{{ $data->deskripsi }}</textarea>
                </div>
              </div>
              <div class="form-group">
                <h4 class="card-title">Bidang</h4>
                <div class="input-group">
                  <input  type="text" placeholder="Bidang" name="bidang" class="form-control" value="{{ $data->bidang }}">
                </div>
              </div>
              <div class="form-group">
                <h4 class="card-title">Penerbit</h4>
                <div class="input-group">
                  <input  type="text" placeholder="Penerbit" name="penerbit" class="form-control" value="{{ $data->penerbit }}">
                </div>
              </div>
            <div class="form-group">
                  <h4 class="card-title">Tanggal Rilis</h4>
                  <div class="input-group">
                    <input  type="text" placeholder="Tanggal Rilis" class="form-control" name="tgl_rilis" value="{{  $data->tgl_rilis }}">
                  </div>
                </div>

            <button class="btn btn-outline-primary btn-sm" type="submit">Update</button>
        </form>

    </div>
    </div>
  </div>
</div>

@endsection

@push('plugin-scripts')
  {!! Html::script('/assets/plugins/chartjs/chart.min.js') !!}
  {!! Html::script('/assets/plugins/jquery-sparkline/jquery.sparkline.min.js') !!}
@endpush

@push('custom-scripts')
  {!! Html::script('/assets/js/dashboard.js') !!}
@endpush