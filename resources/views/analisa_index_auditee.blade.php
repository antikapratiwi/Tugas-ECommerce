@extends('layout.master')

@push('plugin-styles')
  {!! Html::style('/assets/plugins/plugin.css') !!} 
@endpush

@section('content')


<div class="row"> {{-- asdasd --}}
  <div class="col-lg-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <h3 class="font-weight-medium">Daftar Analisa</h3>
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th> # </th>
                <th> Deskripsi </th>
                <th> Kondisi Awal </th>
                <th> Dasar Evaluasi </th>
                <th> Mematuhi Standar </th>
                {{-- <th> Temuan </th> --}}
              </tr>
            </thead>
            <tbody>
              @php
                $index = 0;
              @endphp
              @foreach ($main_data as $klausul_audit)
                @foreach($klausul_audit->sub_klausul_audits as $sub_klausul_audit)
                  @php
                    $index++;

                    $analisa = $sub_klausul_audit->analisa
                  @endphp

                  @if(isset($analisa))
                  <tr>
                    <td class="font-weight-medium"> {{ $index }}</td>
                    <td> {{ $analisa->deskripsi }} </td>
                    <td> {{ $analisa->kondisi_awal }} </td>
                    <td> {{ $analisa->dasar_evaluasi }} </td>
                    <td> 
                      @if($analisa->mematuhi_standar === 1)
                        <div class="badge badge-success badge-rounded p-2">Ya</div>
                      @elseif($analisa->mematuhi_standar === 0)
                        <div class="badge badge-warning badge-rounded p-2">Tidak</div>
                      @endif
                    </td>
                    {{-- 
                    <td>
                      @if($analisa->mematuhi_standar === 0)
                        <a href="/temuan_index">
                          <button type="button" class="btn btn-rounded btn-primary">
                            Lihat
                          </button>
                        </a>
                      @endif
                    </td>
                    --}}
                  </tr>
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