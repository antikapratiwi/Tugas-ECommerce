@extends('layout.master')

@push('plugin-styles')
  {!! Html::style('/assets/plugins/plugin.css') !!} 
@endpush

@section('content')


<div class="row"> {{-- asdasd --}}
  <div class="col-lg-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Daftar Unit</h4>
        <a href="/unit_create">
          <button type="button" class="btn btn-success btn-sm"> Tambah Unit </button>
        </a> 
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th> # </th>
                <th> Nama </th>
                <th> Alamat </th>
                <th> Nama Pimpinan </th>
                <th> NIP Pimpinan </th>
                <th> Aksi </th>
              </tr>
            </thead>
            <tbody>
              @if (isset($main_data) && count($main_data) != 0)
                @foreach ($main_data as $data)
                  <tr>
                    <td class="font-weight-medium"> {{ $loop->iteration }}</td>
                    <td> {{ $data->nama }} </td>
                    <td> {{ $data->alamat }} </td>
                    <td> {{ $data->nama_pimpinan }} </td>
                    <td> {{ $data->nip_pimpinan }} </td>
                    <td> {{-- FOR BUTTONS --}}
                      <button type="button" class="btn btn-rounded btn-primary btn-fw">
                        View
                      </button>
                      <button type="button" class="btn btn-rounded btn-dark btn-fw">
                        Edit
                      </button>
                      <a href="/unit_destroy/{{ $data->id }}">
                        <button type="button" class="btn btn-rounded btn-danger btn-fw">
                          Remove
                        </button>
                      </a>
                      {{-- <form action="/"></form> --}}
                    </td>
                  </tr>
                @endforeach
              @else
                <h3>Empty</h3>
              @endif
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