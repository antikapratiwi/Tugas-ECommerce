@extends('layout.master')

@push('plugin-styles')
  {!! Html::style('/assets/plugins/plugin.css') !!} 
@endpush

@section('content')


<div class="row"> {{-- asdasd --}}
  <div class="col-lg-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <h3 class="font-weight-medium">Rancang Respon Temuan</h3>
        <a href="/temuan_index_auditee">
          <button type="button" class="btn btn-danger btn-sm mb-4"> Kembali </button>
        </a> 
        <form method="post" enctype="multipart/form-data" action="/respontemuan_store">
          @csrf
          <input hidden type="number" id="id_temuan" name="id_temuan" value="{{ $temuan->id }}">

          <h4>
            Temuan: 
            <div class="badge badge-secondary badge-rounded p-2">
              {{ $temuan->penyebab }}
            </div>
          </h4>

          <div class="form-group">
            <h4 class="card-title">Feedback</h4>
            <div class="input-group">
              <input type="text" placeholder="Feedback" class="form-control" id="feedback" name="feedback">
            </div>
          </div>
          <div class="form-group">
            <h4 class="card-title">Rencana Tindak Lanjut</h4>
            <div class="input-group">
              <input type="text" placeholder="Rencana Tindak Lanjut" class="form-control" id="rencana_tindak_lanjut" name="rencana_tindak_lanjut">
            </div>
          </div>
          <div class="form-group">
            <h4 class="card-title">Tanggal Kesanggupan</h4>
            <div class="input-group">
              <input type="date" placeholder="Tanggal Kesanggupan" class="form-control" id="tgl_kesanggupan" name="tgl_kesanggupan">
            </div>
          </div>

          <button type="submit" class="btn btn-primary btn-sm"> Submit </button>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  function showTemuan(select) {
    if (select.value == 0) {
      document.getElementById("create-temuan").style.display = "block";
    } else {
      document.getElementById("create-temuan").style.display = "none";
    }
  }
</script>

@endsection

@push('plugin-scripts')
  {!! Html::script('/assets/plugins/chartjs/chart.min.js') !!}
  {!! Html::script('/assets/plugins/jquery-sparkline/jquery.sparkline.min.js') !!}
@endpush --}}

@push('custom-scripts')
  {!! Html::script('/assets/js/dashboard.js') !!}
@endpush