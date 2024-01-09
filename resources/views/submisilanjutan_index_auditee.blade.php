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
        <h1 class="font-weight-medium mb-3">Submisi</h1>

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
                      <th scope="col" style="width: 500px"> Sub Klausul </th>
                      <th scope="col" style="width: 500px"> Mematuhi Standar </th>
                      <th scope="col" style="width: 500px"> Temuan </th>
                      <th scope="col" style="width: 75px"> File Pembuktian Lanjutan </th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                      $index = 0;
                    @endphp
                    @foreach($klausul_audit->sub_klausul_audits as $sub_klausul_audit)
                      @php
                        $analisa = $sub_klausul_audit->analisa;
                        $index++; 
                      @endphp
                      @if(isset($analisa))
                        @php
                          $temuan = $analisa->temuan;
                          if(isset($temuan)){ 
                            $respon_temuan = $temuan->respon_temuan;
                            if(isset($respon_temuan)){
                              $file_upload_lanjutan = $respon_temuan->file_upload_lanjutan;
                            }
                          }
                        @endphp
                        <tr>
                          <td class="font-weight-medium"> {{ $loop->iteration }}</td>
                          <td> {{ substr($sub_klausul_audit->deskripsi, 0, 20) . "..."}} </td>
                          <td> 
                            @if($analisa->mematuhi_standar === 1)
                              <div class="badge badge-success badge-rounded p-2">Ya</div>
                            @elseif($analisa->mematuhi_standar === 0)
                              <div class="badge badge-warning badge-rounded p-2">Tidak</div>
                            @endif
                          </td>
                          <td>
                            @if($analisa->mematuhi_standar === 1)
                              {{ " - " }}
                            @elseif($analisa->mematuhi_standar === 0)
                              <a href="/temuan_index_auditee">
                                <button type="button" class="btn btn-rounded btn-primary">
                                  Lihat
                                </button>
                              </a>
                            @endif
                          </td>
                          <td>
                            @if($analisa->mematuhi_standar === 1)
                              {{ " - " }}
                            @else
                              @if(isset($file_upload_lanjutan))
                                <a href="/fileuploadlanjutan_index">
                                  <button type="button" class="btn btn-rounded btn-info">
                                    Lihat File Pembuktian Lanjutan
                                  </button>
                                </a>
                              @else
                                @if(isset($respon_temuan))
                                  <form action="/fileuploadlanjutan_create/{{ $respon_temuan->id }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <button type="submit" class="btn btn-primary btn-sm">Kirim File Pembuktian Lanjutan</button>
                                  </form>
                                @else
                                  <button disabled type="submit" class="btn btn-primary btn-sm">Kirim File Pembuktian Lanjutan</button>
                                @endif

                              @endif
                            @endif

                          </td>
                        </tr>
                      @else
                        <tr>
                          <td class="font-weight-medium"> {{ $loop->iteration }}</td>
                          <td> {{ substr($sub_klausul_audit->deskripsi, 0, 20) . "..."}} </td>
                          <td> {{ " - " }} </td>
                          <td> {{ " - " }} </td>
                          <td> {{ " - " }} </td>
                        </tr> 
                      @endif
                    @endforeach
                  </tbody>
                </table>
              </div>
            @endif
          </div>
        @endforeach
        

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