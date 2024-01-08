@extends('layout.master')

@push('plugin-styles')
  {!! Html::style('/assets/plugins/plugin.css') !!} 
@endpush

@section('content')


<div class="row"> {{-- asdasd --}}
  <div class="col-lg-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <h3 class="font-weight-medium">Rancang Analisa</h3>
        <a href="/submisi_index_auditor">
          <button type="button" class="btn btn-danger btn-sm mb-4"> Kembali </button>
        </a> 
        <form method="post" enctype="multipart/form-data" action="/analisa_create">
          @csrf
          <input hidden type="number" id="id_sub_klausul_audit" name="id_sub_klausul_audit" value="{{ $subKlausulAudit->id }}">

          <h4>
            Sub Klausul: 
            <div class="badge badge-secondary badge-rounded p-2">
              {{ $subKlausulAudit->deskripsi }}
            </div>
          </h4>

          <div class="form-group">
            <h4 class="card-title">Deskripsi</h4>
            <div class="input-group">
              <input type="text" placeholder="Deskripsi" class="form-control" id="deskripsi" name="deskripsi">
            </div>
          </div>
          <div class="form-group">
            <h4 class="card-title">Kondisi Awal</h4>
            <div class="input-group">
              <input type="text" placeholder="Kondisi Awal" class="form-control" id="kondisi_awal" name="kondisi_awal">
            </div>
          </div>
          <div class="form-group">
            <h4 class="card-title">Dasar Evaluasi</h4>
            <div class="input-group">
              <input type="text" placeholder="Dasar Evaluasi" class="form-control" id="dasar_evaluasi" name="dasar_evaluasi">
            </div>
          </div>
          <div class="form-group">
            <h4 class="card-title">Mematuhi Standar</h4>
            <div class="input-group">
              <select class="custom-select" name="mematuhi_standar" onchange="showTemuan(this)">
                <option value="1">Ya</option>
                <option value="0">Tidak</option>
            </select>
            </div>
          </div>

          <div class="card-body p-2" id="create-temuan"  style="display: none">
            <div style="border-left: 4px solid #ebedf2; padding-left: 16px">
            <h3 class="font-weight-medium">Rancang Temuan</h3>
            <div class="form-group">
              <h4 class="card-title">Jenis</h4>
              <div class="input-group">
                <select class="custom-select" name="jenis">
                  {{-- <option selected>Pilih</option> --}}
                  <option value="major">Major</option>
                  <option value="minor">Minor</option>
              </select>
              </div>
            </div>
            <div class="form-group">
              <h4 class="card-title">Penyebab</h4>
              <div class="input-group">
                <input type="text" placeholder="Penyebab" class="form-control" id="penyebab" name="penyebab">
              </div>
            </div>
            <div class="form-group">
              <h4 class="card-title">Akibat</h4>
              <div class="input-group">
                <input type="text" placeholder="Akibat" class="form-control" id="akibat" name="akibat">
              </div>
            </div>

            <div class="form-group">
              <h4 class="card-title">Rekomendasi Tindak Lanjut</h4>
              <div class="input-group">
                <input type="text" placeholder="Rekomendasi Tindak Lanjut" class="form-control" id="rekomendasi_tindak_lanjut" name="rekomendasi_tindak_lanjut">
              </div>
            </div></div>
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