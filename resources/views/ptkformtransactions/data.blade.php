@extends('default')

@section('addCss')
    <link id="themeColors" rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />
    <link id="themeColors" rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.2/css/buttons.dataTables.css" />
@endsection

@section('content')
    <div class="card bg-light-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">Data Recruitment</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="text-muted " href="./index.html">Dashboard</a></li>
                            <li class="breadcrumb-item" aria-current="page">Data Recruitment</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table id="example" class="table border table-striped table-bordered display nowrap dataTable no-footer">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Applied</th>
                    <th>Kampus</th>
                    <th>Jurusan</th>
                    <th>Status</th>
                    <th>Applied</th>
                    <th>HC Interview</th>
                    <th>Psikotest</th>
                    <th>User Interview</th>
                    <th>Direktor Interview</th>
                    <th>Finalisasi</th>
                    <th>MCU</th>
                    <th>Join</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ptkformtransactions as $i => $ptkformtransaction)
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td>{{ $ptkformtransaction->user->name }}</td>
                        <td>{{ $ptkformtransaction->ptkform->jobtitle->jobtitle_name }}</td>

                            <?php
                                $a = $ptkformtransaction->user->datapendidikanformal;
                            ?>

                            @if (count($a) > 0)
                            <td> {{$ptkformtransaction->user->datapendidikanformal[count($a)-1]->instansi}}
                            </td>
                            <td> {{$ptkformtransaction->user->datapendidikanformal[count($a)-1]->jurusan}}
                            </td>
                            @else
                            <td> - </td>
                            <td> - </td>
                            @endif
                        <td>{{ \App\Constants\Constants::StatusForm[$ptkformtransaction->status] }}</td>
                        <td>{{ $ptkformtransaction->applied ?? '-' }}</td>
                        <td>{{ $ptkformtransaction->interview_hc ?? '-' }}</td>
                        <td>{{ $ptkformtransaction->psikotest ?? '-' }}</td>
                        <td>{{ $ptkformtransaction->interview_user ?? '-' }}</td>
                        <td>{{ $ptkformtransaction->interview_direksi ?? '-' }}</td>
                        <td>{{ $ptkformtransaction->finalisasi ?? '-' }}</td>
                        <td>{{ $ptkformtransaction->mcu ?? '-' }}</td>
                        <td>{{ $ptkformtransaction->join ?? '-' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop

@section('addJs')
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.2/js/dataTables.buttons.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.dataTables.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.print.min.js"></script>

    <script>
        new DataTable('#example', {
            scrollX: true,
            layout: {
                topStart: {
                    buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
                }
            }
        });
    </script>
@endsection
