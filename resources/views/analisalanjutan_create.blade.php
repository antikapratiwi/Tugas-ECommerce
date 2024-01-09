@extends('layout.master')

@push('plugin-styles')
  {!! Html::style('/assets/plugins/plugin.css') !!} 
@endpush

@section('content')


<div class="row"> {{-- asdasd --}}
  <div class="col-lg-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <h3 class="font-weight-medium">Rancang Analisa Lanjutan</h3>
        <a href="/submisilanjutan_index">
          <button type="button" class="btn btn-danger btn-sm mb-4"> Kembali </button>
        </a> 
        <form method="post" enctype="multipart/form-data" action="/analisalanjutan_create">
          @csrf
          <input hidden type="number" id="id_respon_temuan" name="id_respon_temuan" value="{{ $responTemuan->id }}">

          <h4>
            Respon Temuan: 
            <div class="badge badge-secondary badge-rounded p-2">
              {{ $responTemuan->feedback }}
            </div>
          </h4>

          <div class="form-group">
            <h4 class="card-title">Mematuhi Standar</h4>
            <div class="input-group mb-3">
              <select class="custom-select" name="mematuhi_standar">
                <option value="1">Ya</option>
                <option value="0">Tidak</option>
              </select>
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