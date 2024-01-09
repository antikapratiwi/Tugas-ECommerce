@extends('layout.master')

@push('plugin-styles')
  {!! Html::style('/assets/plugins/plugin.css') !!} 
@endpush

@section('content')

{{-- @dd(session()) --}}
{{-- @dd(Auth::user()) --}}

<div class="row"> {{-- asdasd --}}
  <div class="col-lg-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <h1 class="font-weight-medium mb-3">Finalisasi Audit</h1>

        @php
          $total_sub_klausul = 0;
          $completed_sub_klausul = 0;
          $total_complied_sub_klausul = 0;
        @endphp
        @foreach($main_data as $klausul_audit)
          <div class="mb-4">
            <h3>{{ "[Klausul " . $loop->iteration . "] " . $klausul_audit->nama }}</h3>
            <h4>{{ $klausul_audit->deskripsi }}</h4>
            @if($klausul_audit->persyaratan == false)
              <div class="badge badge-secondary badge-rounded p-2">Normatif</div>
            @else
              <div class="table">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th scope="col" style="width: 10px"> # </th>
                      <th scope="col" style="width: 300px"> Sub Klausul </th>
                      <th scope="col" style="width: 75px"> Mematuhi Standar saat Audit </th>
                      <th scope="col" style="width: 75px"> Mematuhi Standar Pasca Audit </th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($klausul_audit->sub_klausul_audits as $sub_klausul_audit)
                      @php
                        $total_sub_klausul++;
                      @endphp
                      
                      <tr>
                        <td class="font-weight-medium"> {{ $loop->iteration }}</td>
                        <td> {{ $sub_klausul_audit->nama }} </td>
                        <td>
                          @php
                            $stage1_filled = false;
                            $stage2_filled = false;

                            $analisa = $sub_klausul_audit->analisa;
                          @endphp
                          @if(isset($analisa))
                            @php
                              $stage1_filled = true;
                            @endphp
                            @if($analisa->mematuhi_standar === 1)
                              <div class="badge badge-success badge-rounded p-2">Ya</div>
                            @elseif($analisa->mematuhi_standar === 0)
                              <div class="badge badge-warning badge-rounded p-2">Tidak</div>
                            @endif
                          @else
                            {{ " - " }}
                          @endif
                        </td>
                        <td>
                          @if($stage1_filled)
                            @if($analisa->mematuhi_standar === 1)
                              @php
                                // OTOMATIS STAGE 2 FILLED KALO STAGE 1 COMPLY
                                $stage2_filled = true;
                                $total_complied_sub_klausul++;
                              @endphp
                              <div class="badge badge-success badge-rounded p-2">Ya</div>
                            @else
                              @php
                                $temuan = $analisa->temuan;
                                if(isset($temuan))
                                {
                                  $respon_temuan = $temuan->respon_temuan;
                                  if(isset($respon_temuan)){
                                    $analisa_lanjutan = $respon_temuan->analisa_lanjutan;
                                  }
                                }
                              @endphp
                              @if(isset($analisa_lanjutan))
                                @php
                                  $stage2_filled = true;
                                @endphp
                                @if($analisa_lanjutan->mematuhi_standar === 1)
                                  @php
                                    $total_complied_sub_klausul++;
                                  @endphp
                                  <div class="badge badge-success badge-rounded p-2">Ya</div>
                                @elseif($analisa_lanjutan->mematuhi_standar === 0)
                                  <div class="badge badge-warning badge-rounded p-2">Tidak</div>
                                @endif
                              @else
                                {{ " - " }}
                              @endif
                            @endif
                          @else
                            {{ " - " }}
                          @endif
                        </td>
                      </tr>
                      
                      @php
                        if($stage1_filled && $stage2_filled)
                        {
                          $completed_sub_klausul++;
                        }
                      @endphp
                    @endforeach
                  </tbody>
                </table>
              </div>
            @endif
          </div>
          
        @endforeach
        
        <h4>Jumlah Sub Klausul: {{ $total_sub_klausul }}</h4>
        <h4>Jumlah Sub Klausul yang terselesaikan: {{ $completed_sub_klausul }}</h4>
        <h4>Jumlah Sub Klausul yang mematuhi standar: {{ $total_complied_sub_klausul }}</h4>
        @if($total_sub_klausul === $completed_sub_klausul)
          <form action="/putusanaudit_create" method="post" enctype="multipart/form-data">
            @csrf
            <input hidden type="number" id="total_sub_klausul" name="total_sub_klausul" value={{ $total_sub_klausul }}>
            <input hidden type="number" id="completed_sub_klausul" name="completed_sub_klausul" value={{ $completed_sub_klausul }}>
            <input hidden type="number" id="total_complied_sub_klausul" name="total_complied_sub_klausul" value={{ $total_complied_sub_klausul }}>
            <button type="submit" class="btn btn-primary btn-lg">Finalisasi Audit</button>
          </form>
        @else
          <button disabled type="submit" class="btn btn-primary btn-lg">Finalisasi Audit</button>
        @endif

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