@extends('layout.master')

@push('plugin-styles')
  {!! Html::style('/assets/plugins/plugin.css') !!} 
@endpush

@section('content')


<div class="row"> {{-- asdasd --}}
  <div class="col-lg-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <h3 class="font-weight-medium">Daftar File Pembuktian Lanjutan</h3>
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th> # </th>
                <th> File </th>
                <th> Keterangan </th>
                <th> Sub Klausul </th>
              </tr>
            </thead>
            <tbody>
              @foreach ($main_data as $data)
                <tr>
                  <td class="font-weight-medium"> {{ $loop->iteration }}</td>
                  <td> {{ $data->file }} </td>
                  <td> {{ $data->keterangan }} </td>
                  {{-- <td> {{ $data->analisa->sub_klausul_audit->nama }} </td> --}}
                  <td> {{ $data->respon_temuan->temuan->analisa->sub_klausul_audit->nama }} </td>
                </tr>
              @endforeach
            </tbody>
          </table>
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