@extends('layout.master')

@push('plugin-styles')
  {!! Html::style('/assets/plugins/plugin.css') !!} 
@endpush

@section('content')


<div class="row"> {{-- asdasd --}}
  <div class="col-lg-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <h3 class="font-weight-medium">Daftar Temuan</h3>
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th> # </th>
                <th> Jenis Temuan </th>
                <th> Penyebab </th>
                <th> Akibat </th>
                <th> Rekomendasi Tindak Lanjut </th>
                <th> Respon Temuan </th>
              </tr>
            </thead>
            <tbody>
              @php
                $index = 0;
              @endphp
              @foreach ($main_data as $klausul_audit)
                @foreach($klausul_audit->sub_klausul_audits as $sub_klausul_audit)
                  @php
                    $analisa = $sub_klausul_audit->analisa
                  @endphp
                  @if(isset($analisa))
                    @php
                      $temuan = $analisa->temuan
                    @endphp
                    @if(isset($temuan))
                      @php
                        $index++;
                      @endphp
                      <tr>
                        <td class="font-weight-medium"> {{ $index }}</td>
                        <td> {{ $temuan->jenis }} </td>
                        <td> {{ $temuan->penyebab }} </td>
                        <td> {{ $temuan->akibat }} </td>
                        <td> {{ $temuan->rekomendasi_tindak_lanjut }} </td>
                        {{-- <td> {{ $analisa->deskripsi }} </td> --}}
                        <td>
                          @php
                            $respon_temuan = $temuan->respon_temuan;
                          @endphp
                          {{-- @if(isset($respon_temuan))
                            <a href="/respontemuan_index_auditee">
                              <button type="button" class="btn btn-rounded btn-primary">
                                Lihat Respon Temuan
                              </button>
                            </a>
                          @else --}}
                            <form action="/respontemuan_create/{{ $temuan->id }}" method="post" enctype="multipart/form-data">
                              @csrf
                              <button type="submit" class="btn btn-primary btn-sm">Rancang Respon Temuan</button>
                            </form>
                          {{-- @endif --}}
                        </td>
                      </tr>
                    @endif
                  @endif
                  
                @endforeach
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