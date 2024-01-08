@extends('layout.master')

@push('plugin-styles')
  {!! Html::style('/assets/plugins/plugin.css') !!} 
@endpush

@section('content')


<h3 class="font-weight-medium">Daftar Billing</h3>
{{-- iterate over data --}}

@foreach ($main_data as $data)
<div class="row"> 
  <div class="col-lg-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-md-3">
              <h4>No Invoice</h4>
          </div>
          <div class="col-md-9">
              <h4>{{ $data->nomor }}</h4>
          </div>
      </div>
      
      <div class="row">
          <div class="col-md-3">
              <h4>Total Tagihan</h4>
          </div>
          <div class="col-md-9">
            
              <h4>{{ Helper::convertCurrency($data->total_tagihan) }}</h4>
          </div>
      </div>
      
      <div class="row">
          <div class="col-md-3">
              <h4>Sisa Tagihan</h4>
          </div>
          <div class="col-md-9">
              <h4>{{ Helper::convertCurrency($data->sisa_tagihan) }}</h4>
          </div>
      </div>
      
      <div class="row">
          <div class="col-md-3">
              <h4>Status</h4>
          </div>
          <div class="col-md-9">
              <h4>{{ $data->status }}</h4>
          </div>
      </div>
      
      <div class="row">
          <div class="col-md-3">
              <h4>Nama Standar</h4>
          </div>
          <div class="col-md-9">
              <h4>{{ $data->nama_standar }}</h4>
          </div>
      </div>
      
        <a href="/periode_create">
          <button type="button" class="btn btn-success btn-sm mb-4"> Tambah Pembayaran </button>
        </a> 
        
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th> # </th>
                <th> Nominal</th>
                <th> Keterangan </th>
                <th> Dibuat Pada </th>
                <th> Bukti Bayar </th>
              </tr>
            </thead>
            <tbody>
                @foreach ($data->pembayaran as $pemb)
                  <tr>
                    <td class="font-weight-medium"> {{ $loop->iteration }}</td>
                    <td> {{ Helper::convertCurrency($pemb->nominal) }} </td>
                    <td> {{ $pemb->keterangan }} </td>
                    <td> {{ $pemb->created_at }} </td>
                    <td> {{-- FOR BUTTONS --}}
                      <a href="/pembayaran/bukti_bayar/{{ $pemb->id }}">
                        <button type="button" class="btn btn-rounded btn-icons btn-primary">
                          <i class="mdi mdi-download"></i>
                        </button>
                      </a>
                    </td>
                  </tr>
                @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endforeach

@endsection

@push('plugin-scripts')
  {!! Html::script('/assets/plugins/chartjs/chart.min.js') !!}
  {!! Html::script('/assets/plugins/jquery-sparkline/jquery.sparkline.min.js') !!}
@endpush --}}

@push('custom-scripts')
  {!! Html::script('/assets/js/dashboard.js') !!}
@endpush