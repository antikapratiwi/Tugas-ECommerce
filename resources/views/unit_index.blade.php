@extends('layout.master')

@push('plugin-styles')
  {!! Html::style('/assets/plugins/plugin.css') !!} 
@endpush

@section('content')


<div class="row"> {{-- asdasd --}}
  <div class="col-lg-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <h3 class="font-weight-medium">Daftar Unit</h3>
<<<<<<< HEAD
        <a href="{{  route('unit.create') }}">
=======
        <a href="/unit_create">
>>>>>>> 44ab182f6ec7e99cb1ab30b9b217da901dd05115
          <button type="button" class="btn btn-success btn-sm mb-4"> Tambah Unit </button>
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
<<<<<<< HEAD
                      <a href="{{ route('unit.show', $data) }}">
=======
                      <a href="/unit_detail/{{ $data->id }}">
>>>>>>> 44ab182f6ec7e99cb1ab30b9b217da901dd05115
                        <button type="button" class="btn btn-rounded btn-icons btn-primary">
                          <i class="mdi mdi-eye"></i>
                        </button>
                      </a>
<<<<<<< HEAD
                      <a href="{{ route('unit.edit', $data) }}">
=======
                      <a href="/unit_edit/{{ $data->id }}">
>>>>>>> 44ab182f6ec7e99cb1ab30b9b217da901dd05115
                        <button type="button" class="btn btn-rounded btn-icons btn-dark">
                          <i class="mdi mdi-pencil"></i>
                        </button>
                      </a>
                      {{-- <a href="/unit_destroy/{{ $data->id }}"> --}}
                      <a href="#">
                        <button type="button" class="btn btn-rounded btn-icons btn-danger">
                          <i class="mdi mdi-delete"></i>
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