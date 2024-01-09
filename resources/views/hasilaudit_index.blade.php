@extends('layout.master')

@push('plugin-styles')
  {!! Html::style('/assets/plugins/plugin.css') !!} 
@endpush

@section('content')


<h3 class="font-weight-medium">Hasil Audit</h3>
{{-- iterate over data --}}

@php
  $is_completed = ($main_data->status === "selesai" ? true : false);
  $data = $main_data->putusan_audit;
@endphp

<div class="row"> 
  <div class="col-lg-12 grid-margin">
    <div class="card">
      
      @if($is_completed)
        <div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-3">
                  <h4>Unit Audit</h4>
              </div>
              <div class="col-md-9">
                  <h4>{{ $main_data->periode->nama . " - " . $main_data->unit->nama }}</h4>
              </div>
          </div>
          
          <div class="row">
              <div class="col-md-3">
                  <h4>Standar Audit</h4>
              </div>
              <div class="col-md-9">
                  <h4>{{ $main_data->standar->nama }}</h4>
              </div>
          </div>

          <div class="row">
              <div class="col-md-3">
                  <h4>Mematuhi Standar</h4>
              </div>
              <div class="col-md-9">
                @if($data->mematuhi_standar === 1)
                  <div class="badge badge-success badge-rounded p-2">Ya</div>
                @elseif($data->mematuhi_standar === 0)
                  <div class="badge badge-warning badge-rounded p-2">Tidak</div>
                @endif
              </div>
          </div>
          
          <div class="row">
              <div class="col-md-3">
                  <h4>Tanggal Rilis</h4>
              </div>
              <div class="col-md-9">
                  <h4>{{ $data->tgl_rilis }}</h4>
              </div>
          </div>
          
          <div class="row">
              <div class="col-md-3">
                  <h4>Tanggal Kadaluwarsa</h4>
              </div>
              <div class="col-md-9">
                  <h4>{{ $data->tgl_kadaluwarsa }}</h4>
              </div>
          </div>
          
          <div class="row">
              <div class="col-md-3">
                  <h4>Keterangan</h4>
              </div>
              <div class="col-md-9">
                  <h4>{{ $data->keterangan }}</h4>
              </div>
          </div>
        </div>
      @else
        <h2>{{ " PELAKSANAAN AUDIT BELUM SELESAI " }}</h2>
      @endif

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