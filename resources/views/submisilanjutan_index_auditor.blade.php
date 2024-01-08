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
                      <th scope="col" style="width: 500px"> Rencana Tindak Lanjut </th>
                      <th scope="col" style="width: 75px"> Tanggal Kesanggupan </th>
                      <th scope="col" style="width: 75px"> File Pembuktian Lanjutan </th>
                      <th scope="col" style="width: 100px"> Analisa Lanjutan</th>
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
                              <td class="font-weight-medium"> {{ $loop->iteration }}</td>
                              <td> {{ substr($sub_klausul_audit->deskripsi, 0, 20) . "..." }} </td>
                              <td> {{ substr($respon_temuan->rencana_tindak_lanjut, 0, 20) . "..."  }} </td>
                              <td> {{ $respon_temuan->tgl_kesanggupan }} </td>
                              <td>
                                @if(isset($respon_temuan->file_upload_lanjutan->file)) 
                                  {{ $respon_temuan->file_upload_lanjutan->file }} 
                                @else
                                  {{ " - " }}
                                @endif
                              </td>
                              <td> {{-- FOR BUTTONS --}}
                                {{-- @if($respon_temuan->analisa_lanjutan === null)
      
                                  @if($respon_temuan->file_upload === null)
                                    <button disabled type="submit" class="btn btn-primary btn-sm">Rancang Analisa Lanjutan</button>
                                  @else --}}
                                    <form action="/analisalanjutan_create/{{ $respon_temuan->id }}" method="post" enctype="multipart/form-data">
                                      @csrf
                                      <button type="submit" class="btn btn-primary btn-sm">Rancang Analisa Lanjutan</button>
                                    </form>
                                  {{-- @endif   --}}
      
                                {{-- @else
                                  <form action="/analisalanjutan_detail/{{ $respon_temuan->analisa_lanjutan->id }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <button type="submit" class="btn btn-info btn-sm">Lihat Analisa Lanjutan</button>
                                  </form>
                                @endif --}}
                              </td>
                            </tr>
                          @else
                            ERROR
                          @endif
                        @else
                          <tr>
                            <td class="font-weight-medium"> {{ $loop->iteration }}</td>
                            <td> {{ substr($sub_klausul_audit->deskripsi, 0, 20) . "..."}} </td>
                            <td> {{ " - " }} </td>
                            <td> {{ " - " }} </td>
                            <td> {{ " - " }} </td>
                            <td>
                              <button disabled type="submit" class="btn btn-success btn-sm">Sudah Mematuhi Standar</button>
                            </td>
                          </tr> 
                        @endif
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