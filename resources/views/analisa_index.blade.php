@extends('layout.master')

@push('plugin-styles')
  {!! Html::style('/assets/plugins/plugin.css') !!} 
@endpush

@section('content')


<div class="row"> {{-- asdasd --}}
  <div class="col-lg-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Daftar Analisa</h4>
        <button type="button" class="btn btn-success btn-sm"> Tambah Analisa </button>
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th> # </th>
                <th> Sub Klausul </th>
                <th> Dasar Evaluasi </th>
                <th> Kondisi Awal </th>
                <th> Mematuhi Standar </th>
                <th> Aksi </th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="font-weight-medium"> 1 </td>
                <td> Herman Beck </td>
                <td>
                  <div class="progress">
                    <div class="progress-bar bg-success progress-bar-striped" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </td>
                <td> $ 77.99 </td>
                <td class="text-danger"> 53.64% <i class="mdi mdi-arrow-down"></i>
                </td>
                <td> {{-- FOR BUTTONS --}}
                  <button type="button" class="btn btn-rounded btn-primary btn-fw">
                    View
                  </button>
                  <button type="button" class="btn btn-rounded btn-dark btn-fw">
                    Edit
                  </button>
                  <button type="button" class="btn btn-rounded btn-danger btn-fw">
                    Remove
                  </button>
                </td>
              </tr>
              <tr>
                <td class="font-weight-medium"> 2 </td>
                <td> Messsy Adam </td>
                <td>
                  <div class="progress">
                    <div class="progress-bar bg-danger progress-bar-striped" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </td>
                <td> $245.30 </td>
                <td class="text-success"> 24.56% <i class="mdi mdi-arrow-up"></i>
                </td>
                <td> {{-- FOR BUTTONS --}}
                  <button type="button" class="btn btn-rounded btn-primary btn-fw">
                    View
                  </button>
                  <button type="button" class="btn btn-rounded btn-dark btn-fw">
                    Edit
                  </button>
                  <button type="button" class="btn btn-rounded btn-danger btn-fw">
                    Remove
                  </button>
                </td>
              </tr>
              <tr>
                <td class="font-weight-medium"> 3 </td>
                <td> John Richards </td>
                <td>
                  <div class="progress">
                    <div class="progress-bar bg-warning progress-bar-striped" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </td>
                <td> $138.00 </td>
                <td class="text-danger"> 28.76% <i class="mdi mdi-arrow-down"></i>
                </td>
                <td> {{-- FOR BUTTONS --}}
                  <button type="button" class="btn btn-rounded btn-primary btn-fw">
                    View
                  </button>
                  <button type="button" class="btn btn-rounded btn-dark btn-fw">
                    Edit
                  </button>
                  <button type="button" class="btn btn-rounded btn-danger btn-fw">
                    Remove
                  </button>
                </td>
              </tr>
              <tr>
                <td class="font-weight-medium"> 4 </td>
                <td> Peter Meggik </td>
                <td>
                  <div class="progress">
                    <div class="progress-bar bg-primary progress-bar-striped" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </td>
                <td> $ 77.99 </td>
                <td class="text-danger"> 53.45% <i class="mdi mdi-arrow-down"></i>
                </td>
                <td> {{-- FOR BUTTONS --}}
                  <button type="button" class="btn btn-rounded btn-primary btn-fw">
                    View
                  </button>
                  <button type="button" class="btn btn-rounded btn-dark btn-fw">
                    Edit
                  </button>
                  <button type="button" class="btn btn-rounded btn-danger btn-fw">
                    Remove
                  </button>
                </td>
              </tr>
              <tr>
                <td class="font-weight-medium"> 5 </td>
                <td> Edward </td>
                <td>
                  <div class="progress">
                    <div class="progress-bar bg-danger progress-bar-striped" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </td>
                <td> $ 160.25 </td>
                <td class="text-success"> 18.32% <i class="mdi mdi-arrow-up"></i>
                </td>
                <td> {{-- FOR BUTTONS --}}
                  <button type="button" class="btn btn-rounded btn-primary btn-fw">
                    View
                  </button>
                  <button type="button" class="btn btn-rounded btn-dark btn-fw">
                    Edit
                  </button>
                  <button type="button" class="btn btn-rounded btn-danger btn-fw">
                    Remove
                  </button>
                </td>
              </tr>
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