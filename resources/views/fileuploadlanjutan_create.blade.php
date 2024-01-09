@extends('layout.master')

@push('plugin-styles')
  {!! Html::style('/assets/plugins/plugin.css') !!} 
@endpush

@section('content')


<div class="row"> {{-- asdasd --}}
  <div class="col-lg-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <h3 class="font-weight-medium">Kirim File Pembuktian Lanjutan</h3>
        <a href="/submisilanjutan_index_auditee">
          <button type="button" class="btn btn-danger btn-sm mb-4"> Kembali </button>
        </a> 
        <form method="post" enctype="multipart/form-data" action="/fileuploadlanjutan_store">
          @csrf
          <input hidden type="number" value={{ $responTemuan->id }} name="id_respon_temuan" id="id_respon_temuan">
          
          <div class="form-group">
            <h4 class="card-title">File Pembuktian Lanjutan</h4>
            <div class="input-group">
              <input type="file" placeholder="File Pembuktian" id="file" name="file">
            </div>
          </div>
          <div class="form-group">
            <h4 class="card-title">Keterangan</h4>
            <div class="input-group">
              <input type="text" placeholder="Keterangan" class="form-control" id="keterangan" name="keterangan">
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