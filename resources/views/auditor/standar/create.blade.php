@extends('layout.master')

@push('plugin-styles')
  {!! Html::style('/assets/plugins/plugin.css') !!} 
@endpush

@section('content')

<div class="row"> {{-- asdasd --}}
  <div class="col-lg-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <h3 class="font-weight-medium">Tambah Standar</h3>
        <a href="{{ route('auditor.standar.index') }}">
          <button type="button" class="btn btn-danger btn-sm mb-4"> Kembali </button>
        </a> 
        
        <form action="{{ route('auditor.standar.store') }}" method="post">
            @csrf
                <div class="form-group">
                    <h4 class="card-title">Nama</h4>
                    <div class="input-group">
                    <input  type="text" placeholder="Nama Unit" class="form-control @error('nama')
                        is-invalid
                    @enderror" id="nama" name="nama" value="{{ old('nama') }}">

                    @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                    </div>
                </div>
              <div class="form-group">
                <h4 class="card-title">Deskripsi</h4>
                <div class="input-group">
                  <textarea type="text" placeholder="Deskripsi" name="deskripsi" class="form-control @error('deskripsi')
                      is-invalid
                  @enderror">{{ old('deskripsi') }}</textarea>
                  @error('deskripsi')
                    <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                </div>
              </div>
              <div class="form-group">
                <h4 class="card-title">Bidang</h4>
                <div class="input-group">
                  <input  type="text" placeholder="Bidang" name="bidang" class="form-control @error('bidang')
                      is-invalid
                  @enderror" value="{{ old('bidang') }}">
                  @error('bidang')
                    <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                </div>
              </div>
              <div class="form-group">
                <h4 class="card-title">Penerbit</h4>
                <div class="input-group">
                  <input  type="text" placeholder="Penerbit" name="penerbit" class="form-control @error('penerbit')
                      is-invalid
                  @enderror" value="{{ old('penerbit') }}">
                  @error('penerbit')
                    <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                </div>
              </div>
            <div class="form-group">
                  <h4 class="card-title">Tanggal Rilis</h4>
                  <div class="input-group">
                    <input  type="date" placeholder="Tanggal Rilis" class="form-control @error('tgl_rilis')
                        is-invalid
                    @enderror" name="tgl_rilis" >
                    @error('tgl_rilis')
                    <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                </div>

            <button class="btn btn-outline-primary btn-sm" type="submit">Create</button>
        </form>

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