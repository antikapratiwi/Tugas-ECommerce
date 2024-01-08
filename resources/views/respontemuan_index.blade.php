@extends('layout.master')

@push('plugin-styles')
  {!! Html::style('/assets/plugins/plugin.css') !!} 
@endpush

@section('content')


<div class="row"> {{-- asdasd --}}
  <div class="col-lg-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <h3 class="font-weight-medium">Daftar Respon Temuan</h3>
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th> # </th>
                <th> Feedback </th>
                <th> Rencana Tindak Lanjut </th>
                <th> Tanggal Kesanggupan </th>
                <th> Status </th>
                <th> Temuan </th>
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
                        $respon_temuan = $temuan->respon_temuan
                      @endphp
                      @if(isset($respon_temuan))
                        @php
                          $index++;
                        @endphp
                        <tr>
                          <td class="font-weight-medium"> {{ $index }}</td>
                          <td> {{ $respon_temuan->feedback }} </td>
                          <td> {{ $respon_temuan->rencana_tindak_lanjut }} </td>
                          <td> {{ $respon_temuan->tgl_kesanggupan }} </td>
                          <td> pending </td>
                          <td>
                            {{-- <a href="/temuan_detail/{{ $temuan->id }}"> --}}
                            <a href="/temuan_index">
                              <button type="button" class="btn btn-rounded btn-primary">
                                Lihat
                              </button>
                            </a>
                          </td>
                        </tr>
                      @else
                        <tr>
                          <td class="font-weight-medium"> {{ $loop->iteration }}</td>
                          <td> (pending)</td>
                          <td> (pending) </td>
                          <td> (pending) </td>
                          <td> (pending) </td>
                          <td>
                            {{-- <a href="/temuan_detail/{{ $temuan->id }}"> --}}
                            <a href="/temuan_index">
                              <button type="button" class="btn btn-rounded btn-primary">
                                Lihat
                              </button>
                            </a>
                          </td>
                        </tr>
                      @endif
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