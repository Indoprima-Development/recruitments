@extends('default')

@section('addCss')
<link rel="stylesheet" href="{{asset('package/dist/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css')}}">
@endsection

@section('content')
<div class="container-fluid">
    <div class="card bg-light-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-12">
                    <h4 class="fw-semibold mb-8">Ranking Test</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="text-muted " href="./index.html">{{$data['exam']->exam_name}}</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- --------------------------------------------------- -->
    <!--  Table Datatable Basic Start -->
    <!-- --------------------------------------------------- -->
    <section class="datatables">
        <!-- basic table -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-2">
                            <h5 class="mb-0">Peringatan</h5>
                        </div>
                        <p class="card-subtitle mb-3">
                            Hasil recruitment bersifat mutlak keputusan dari <code> PT.Indoprima Gemilang</code>.
                        </p>
                        <div class="table-responsive">
                            <table id="zero_config" class="table border table-bordered text-nowrap">
                                <thead>
                                    <!-- start row -->
                                    <tr>
                                        <th class="text-center">Rank</th>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">KTP</th>
                                        <th class="text-center">Score</th>
                                        <th class="text-center">Status</th>
                                    </tr>
                                    <!-- end row -->
                                </thead>
                                <tbody>
                                    @foreach($data['examTransaction'] as $i => $d)
                                    <tr>
                                        <td class="text-center">{{$i+1}}</td>
                                        <td class="text-center">{{$d->user->name}}</td>
                                        <td class="text-center">{{EncryptKTP($d->user->ktp)}}</td>
                                        <td class="text-center">{{$d->score}}</td>
                                        <td class="text-center">
                                            @if($d->score >= 80)
                                            <span class="badge fw-semibold py-1 bg-primary-subtle text-primary">LOLOS</span>
                                            @else
                                            <span class="badge fw-semibold py-1 bg-danger-subtle text-danger">TIDAK LOLOS</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                    <!-- end row -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@section('addJs')
<script src="{{asset('package/dist/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>

<script src="{{asset('package/dist/js/datatable/datatable-basic.init.js')}}"></script>
@endsection