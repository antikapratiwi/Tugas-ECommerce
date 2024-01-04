@extends('layout.master')

@push('plugin-styles')
  {!! Html::style('/assets/plugins/plugin.css') !!} 
@endpush

@section('content')


<div class="row"> {{-- asdasd --}}
  <div class="col-lg-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Tambah Unit</h4>
        <form method="post" enctype="multipart/form-data" action="/unit_create">
          @csrf
          <div class="form-group">
            <div class="input-group">
              <input type="text" placeholder="Nama Unit" class="form-control" id="nama" name="nama">
            </div>
          </div>
          <div class="form-group">
            <div class="input-group">
              <input type="text" placeholder="Alamat" class="form-control" id="alamat" name="alamat">
            </div>
          </div>
          <div class="form-group">
            <div class="input-group">
              <input type="text" placeholder="Nama Pimpinan" class="form-control" id="nama_pimpinan" name="nama_pimpinan">
            </div>
          </div>
          <div class="form-group">
            <div class="input-group">
              <input type="text" placeholder="NIP Pimpinan" class="form-control" id="nip_pimpinan" name="nip_pimpinan">
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