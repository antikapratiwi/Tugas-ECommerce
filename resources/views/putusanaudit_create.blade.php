@extends('layout.master')

@push('plugin-styles')
  {!! Html::style('/assets/plugins/plugin.css') !!} 
@endpush

@section('content')


<div class="row"> {{-- asdasd --}}
  <div class="col-lg-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <h3 class="font-weight-medium">Rancang Putusan Audit</h3>
        <a href="/finalisasiaudit_index">
          <button type="button" class="btn btn-danger btn-sm mb-4"> Kembali </button>
        </a> 
        <form method="post" enctype="multipart/form-data" action="/putusanaudit_store">
          @csrf
          <h4>
            Unit Audit: 
            <div class="badge badge-secondary badge-rounded p-2">
              {{ $unit_audit }}
            </div>
          </h4>

          <div class="form-group">
            <h3 class="card-title">Jumlah Sub Klausul: {{ $total_sub_klausul }}</h3>
            <h3 class="card-title">Jumlah Sub Klausul yang terselesaikan: {{ $completed_sub_klausul }}</h3>
            <h3 class="card-title">Jumlah Sub Klausul yang mematuhi standar: {{ $total_complied_sub_klausul }}</h3>
            <h4 class="card-title">Mematuhi Standar</h4>
            <div class="input-group mb-3">
              <select readonly class="custom-select" name="mematuhi_standar">
                <option value="1">Ya</option>
                <option value="0">Tidak</option>
              </select>
            </div>
            <div class="form-group">
              <h4 class="card-title">Tanggal Rilis</h4>
              <div class="input-group">
                <input type="date" placeholder="Tanggal Rilis" class="form-control" id="tgl_rilis" name="tgl_rilis">
              </div>
            </div>
            <div class="form-group">
              <h4 class="card-title">Tanggal Kadaluwarsa</h4>
              <div class="input-group">
                <input type="date" placeholder="Tanggal Kadaluwarsa" class="form-control" id="tgl_kadaluwarsa" name="tgl_kadaluwarsa">
              </div>
            </div>
            <div class="form-group">
              <h4 class="card-title">Keterangan</h4>
              <div class="input-group">
                <input type="text" placeholder="Keterangan" class="form-control" id="keterangan" name="keterangan">
              </div>
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