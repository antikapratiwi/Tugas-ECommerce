@extends('layout.master')

@push('plugin-styles')
  {!! Html::style('/assets/plugins/plugin.css') !!} 
@endpush

@section('content')


<div class="row"> {{-- asdasd --}}
  <div class="col-lg-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <h3 class="font-weight-medium">Daftar Unit Audit</h3>
        <a href="/unit_create">
          <button type="button" class="btn btn-success btn-sm mb-4"> Tambah Unit Audit </button>
        </a> 

        @include('components.unitaudit-state-alt')

        {{-- {{ dd(\Illuminate\Support\Facades\Log::info(session()->getId())); }} --}}
        {{-- {{ dd(session()->isStarted()) }} --}}
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th> # </th>
                <th> Nama Unit Audit</th>
                <th> Standar</th>
                <th> Deskripsi </th>
                <th> Status </th>
                <th> Aksi </th>
              </tr>
            </thead>
            <tbody>
              @if (isset($main_data) && count($main_data) != 0)
                @foreach ($main_data as $data)
                  <tr>
                    <td class="font-weight-medium"> {{ $loop->iteration }}</td>
                    <td> {{ $data->periode->nama }} - {{ $data->unit->nama }} </td>
                    <td> {{ $data->standar->nama }} </td>
                    <td> {{ $data->deskripsi }} </td>
                    <td> 
                      @if($data->status == "selesai")
                        <div class="badge badge-success badge-rounded p-2">Selesai</div>
                      @elseif($data->status == "belum selesai")
                        <div class="badge badge-warning badge-rounded p-2">Belum Selesai</div>
                      @endif
                    </td>
                    <td> {{-- FOR BUTTONS --}}
                      <div class="container">
                        <div class="row align-items-center">
                          @if($session_unit_audit === "(belum dipilih)" || $session_unit_audit !== ($data->periode->nama . " - " . $data->unit->nama))
                            <form class="m-0 mr-1" method="post" enctype="multipart/form-data" action="/unitaudit_select/{{ $data->id }}">
                              @csrf
                              <button type="submit" class="btn btn-info btn-sm px-2"> Pilih </button>
                            </form>
                          @else
                            <form class="m-0 mr-1" method="post" enctype="multipart/form-data" action="/unitaudit_unselect">
                              @csrf
                              <button type="submit" class="btn btn-danger btn-sm px-2"> Lepas </button>
                            </form>
                          @endif
    
                          {{-- <a href="/unitaudit_detail/{{ $data->id }}"> --}}
                          <a href="#">
                            <button type="button" class="mr-1 btn btn-rounded btn-icons btn-primary">
                              <i class="mdi mdi-eye"></i>
                            </button>
                          </a>
                          {{-- <a href="/unitaudit_edit/{{ $data->id }}"> --}}
                          <a href="#">
                            <button type="button" class="mr-1 btn btn-rounded btn-icons btn-dark">
                              <i class="mdi mdi-pencil"></i>
                            </button>
                          </a>
                          {{-- <a href="/unit_destroy/{{ $data->id }}"> --}}
                          <a href="#">
                            <button type="button" class="mr-1 btn btn-rounded btn-icons btn-danger">
                              <i class="mdi mdi-delete"></i>
                            </button>
                          </a>
                          {{-- <form action="/"></form> --}}
                        </div>
                      </div>
                      
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