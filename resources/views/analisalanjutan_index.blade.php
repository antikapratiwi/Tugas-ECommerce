@extends('layout.master')

@push('plugin-styles')
  {!! Html::style('/assets/plugins/plugin.css') !!} 
@endpush

@section('content')


<div class="row"> {{-- asdasd --}}
  <div class="col-lg-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <h3 class="font-weight-medium">Daftar Analisa Lanjutan</h3>
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th> # </th>
                <th> Keterangan </th>
                <th> Mematuhi Standar </th>
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
                        $respon_temuan = $temuan->respon_temuan
                      @endphp
                      @if(isset($respon_temuan))
                        @php
                          $analisa_lanjutan = $respon_temuan->analisa_lanjutan;
                          $index++;
                        @endphp
                        @if(isset($analisa_lanjutan))
                          <tr>
                            <td class="font-weight-medium"> {{ $index }}</td>
                            <td> {{ $analisa_lanjutan->keterangan }}</td>
                            <td> 
                              @if($analisa_lanjutan->mematuhi_standar === 1)
                                <div class="badge badge-success badge-rounded p-2">Ya</div>
                              @elseif($analisa_lanjutan->mematuhi_standar === 0)
                                <div class="badge badge-warning badge-rounded p-2">Tidak</div>
                              @endif
                            </td>
                            <td>
                              {{-- <a href="/temuan_detail/{{ $temuan->id }}"> --}}
                              <a href="/respontemuan_index">
                                <button type="button" class="btn btn-rounded btn-primary">
                                  Lihat
                                </button>
                              </a>
                            </td>
                          </tr>                        
                        @else
                          <tr>
                            <td class="font-weight-medium"> {{ $index }}</td>
                            <td> (pending)</td>
                            <td> (pending)</td>
                            <td>
                              {{-- <a href="/temuan_detail/{{ $temuan->id }}"> --}}
                              <a href="/respontemuan_index">
                                <button type="button" class="btn btn-rounded btn-primary">
                                  Lihat
                                </button>
                              </a>
                            </td>
                          </tr>
                        @endif
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