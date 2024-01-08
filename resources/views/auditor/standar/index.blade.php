@extends('layout.master')

@push('plugin-styles')
  {!! Html::style('/assets/plugins/plugin.css') !!} 
@endpush

@section('content')


<div class="row"> {{-- asdasd --}}
  <div class="col-lg-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <h3 class="font-weight-medium">Daftar Standar</h3>
        <a href="{{ route('auditor.standar.create') }}">
          <button type="button" class="btn btn-success btn-sm mb-4"> Tambah Standar </button>
        </a> 
        
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th> # </th>
                <th> Nama </th>
                <th> Deskripsi </th>
                <th> Bidang </th>
                <th> Tanggal Rilis </th>
                <th> Aksi </th>
              </tr>
            </thead>
            <tbody>
              @if (isset($standars) && count($standars) != 0)
                @foreach ($standars as $data)
                  <tr>
                    <td class="font-weight-medium"> {{ $standars->firstItem()+$loop->index }}</td>
                    <td> {{ $data->nama }} </td>
                    <td> {{ Str::limit($data->deskripsi, 20, '...') }}</td>
                    <td> {{ $data->bidang }} </td>
                    <td> {{ $data->tgl_rilis }} </td>
                    <td> {{-- FOR BUTTONS --}}
                      <a href="{{ route('auditor.standar.show', $data) }}">
                        <button type="button" class="btn btn-rounded btn-icons btn-primary">
                          <i class="mdi mdi-eye"></i>
                        </button>
                      </a>
                      <a href="{{ route('auditor.standar.edit', $data) }}">
                        <button type="button" class="btn btn-rounded btn-icons btn-dark">
                          <i class="mdi mdi-pencil"></i>
                        </button>
                      </a>
                      {{-- <a href="/periode_destroy/{{ $data->id }}"> --}}
                        <form action="{{ route('auditor.standar.destroy', $data) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-rounded btn-icons btn-danger">
                          <i class="mdi mdi-delete"></i>
                        </button>
                        </form>
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

        <div>
          {{ $standars->links('pagination::bootstrap-5') }}
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@push('plugin-scripts')
  {!! Html::script('/assets/plugins/chartjs/chart.min.js') !!}
  {!! Html::script('/assets/plugins/jquery-sparkline/jquery.sparkline.min.js') !!}
@endpush

@push('custom-scripts')
  {!! Html::script('/assets/js/dashboard.js') !!}
@endpush