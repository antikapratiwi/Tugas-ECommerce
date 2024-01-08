@extends('layout.master')

@push('plugin-styles')
{!! Html::style('/assets/plugins/plugin.css') !!}
@endpush

@section('content')


<div class="row"> {{-- asdasd --}}
  <div class="col-lg-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <h3 class="font-weight-medium">Tambah Pembayaran</h3>
        <a href="/pembayaran_index">
          <button type="button" class="btn btn-danger btn-sm mb-4"> Kembali </button>
        </a>
        <form method="post" enctype="multipart/form-data" action="/pembayaran_create">
          @csrf
          <input type="text"  hidden placeholder="id_billing" class="form-control" id="id_billing" name="id_billing" value="{{ $id_billing }}">

          <div class="form-group">
            <h4 class="card-title">Nominal</h4>
            <div class="input-group">
              <input type="number" placeholder="Nominal" class="form-control" id="nominal" name="nominal">
            </div>
          </div>
          <div class="form-group">
            <h4 class="card-title">Keterangan</h4>
            <div class="input-group">
              <input type="text" placeholder="Keterangan" class="form-control" id="keterangan" name="keterangan">
            </div>
          </div>
          <div class="form-group">
            <h4 class="card-title">Bukti Bayar</h4>
            <div class="input-group">
              <input type="file" placeholder="Bukti Bayar" id="bukti_bayar" name="bukti_bayar">
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