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
                      <th scope="col" style="width: 200px"> Sub Klausul </th>
                      <th scope="col" style="width: 75px"> Instruksi </th>
                      <th scope="col" style="width: 75px"> File Pembuktian </th>
                      <th scope="col" style="width: 100px"> Analisa </th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($klausul_audit->sub_klausul_audits as $sub_klausul_audit)
                      <tr>
                        <td class="font-weight-medium"> {{ $loop->iteration }}</td>
                        <td> {{ $sub_klausul_audit->nama }} </td>
                        <td> {{ $sub_klausul_audit->instruksi_file_upload }} </td>
                        <td> {{-- FOR BUTTONS --}}
                          @if($sub_klausul_audit->file_upload === null)
                            <form action="/fileupload_create/{{ $sub_klausul_audit->id }}" method="post" enctype="multipart/form-data">
                              @csrf
                              <button type="submit" class="btn btn-primary btn-sm mt-2">Kirim File Pembuktian</button>
                            </form>
                          @else
                          <a href="/fileupload_index">
                            <button type="button" class="btn btn-rounded btn-primary">
                              Lihat
                            </button>
                          </a>
                          @endif
                        </td>
                        <td>
                          @if(isset($sub_klausul_audit->analisa)) 
                            <a href="/analisa_index_auditee">
                              <button type="button" class="btn btn-rounded btn-primary">
                                Lihat
                              </button>
                            </a>
                          @else
                            {{ " (belum dianalisa) " }}
                          @endif
                        </td>
                      </tr>
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