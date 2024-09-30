@extends('default')

@section('addCss')
    <link id="themeColors" rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />
    <link id="themeColors" rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.2/css/buttons.dataTables.css" />
@endsection

@section('cardClass')
@endsection

@section('content2')
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
                    <th>Posisi</th>
                    <th>Kampus</th>
                    <th>Jurusan</th>
                    <th>PIC</th>
                    <th>Score Candidate</th>
                    <th>CV Review</th>
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
                        <td>
                            <a href="{{url('datadiris/data-users', $ptkformtransaction->user->id)}}">
                                {{ $ptkformtransaction->user->name }}
                            </a>
                        </td>
                        <td>{{ $ptkformtransaction->ptkform->jobtitle->jobtitle_name ?? "-" }}</td>

                        <?php
                        $a = $ptkformtransaction->user->datapendidikanformal;
                        ?>

                        @if (count($a) > 0)
                            <td> {{ $ptkformtransaction->user->datapendidikanformal[count($a) - 1]->instansi }}
                            </td>
                            <td> {{ $ptkformtransaction->user->datapendidikanformal[count($a) - 1]->jurusan }}
                            </td>
                        @else
                            <td> - </td>
                            <td> - </td>
                        @endif
                        <td>{{$ptkformtransaction->pic}}</td>
                        <td>{{$ptkformtransaction->score_candidate ?? 0}}</td>
                        <td>
                            @if ($ptkformtransaction->status == 0)
                                <button ptkformtrid="{{$ptkformtransaction->id}}" status="0" type="button" types="cv_review" class="btnEditStatus btn btn-sm btn-outline-primary" names="{{ $ptkformtransaction->user->name }}">
                                    <span class="badge bg-success">
                                        <i class="ti ti-square-check"></i>
                                    </span>
                                    <span class="badge bg-danger">
                                        <i class="ti ti-xbox-x"></i>
                                    </span>
                                </button>
                            @else
                                {{ $ptkformtransaction->cv_review != null ? substr($ptkformtransaction->cv_review,0,10) : '-' }}
                            @endif
                        </td>
                        <td>
                            @if ($ptkformtransaction->status == 1)
                                <button ptkformtrid="{{$ptkformtransaction->id}}" status="1" type="button" types="interview_hc" class="btnEditStatus btn btn-sm btn-outline-primary">
                                    <span class="badge bg-success">
                                        <i class="ti ti-square-check"></i>
                                    </span>
                                    <span class="badge bg-danger">
                                        <i class="ti ti-xbox-x"></i>
                                    </span>
                                </button>
                            @else
                            {{ $ptkformtransaction->interview_hc != null ? substr($ptkformtransaction->interview_hc,0,10) : '-' }}
                            @endif
                        </td>
                        <td>
                            @if ($ptkformtransaction->status == 2)
                                <button ptkformtrid="{{$ptkformtransaction->id}}" status="2" type="button" types="psikotest" class="btnEditStatus btn btn-sm btn-outline-primary">
                                    <span class="badge bg-success">
                                        <i class="ti ti-square-check"></i>
                                    </span>
                                    <span class="badge bg-danger">
                                        <i class="ti ti-xbox-x"></i>
                                    </span>
                                </button>
                            @else
                                {{ $ptkformtransaction->psikotest != null ? substr($ptkformtransaction->psikotest,0,10) : '-' }}
                            @endif
                        </td>
                        <td>
                            @if ($ptkformtransaction->status == 3)
                                <button ptkformtrid="{{$ptkformtransaction->id}}" status="3" type="button" types="interview_user" class="btnEditStatus btn btn-sm btn-outline-primary">
                                    <span class="badge bg-success">
                                        <i class="ti ti-square-check"></i>
                                    </span>
                                    <span class="badge bg-danger">
                                        <i class="ti ti-xbox-x"></i>
                                    </span>
                                </button>
                            @else
                                {{ $ptkformtransaction->interview_user != null ? substr($ptkformtransaction->interview_user,0,10) : '-' }}
                            @endif
                        </td>
                        <td>
                            @if ($ptkformtransaction->status == 4)
                                <button ptkformtrid="{{$ptkformtransaction->id}}" status="4" type="button" types="interview_direksi" class="btnEditStatus btn btn-sm btn-outline-primary">
                                    <span class="badge bg-success">
                                        <i class="ti ti-square-check"></i>
                                    </span>
                                    <span class="badge bg-danger">
                                        <i class="ti ti-xbox-x"></i>
                                    </span>
                                </button>
                            @else
                                {{ $ptkformtransaction->interview_direksi != null ? substr($ptkformtransaction->interview_direksi,0,10) : '-' }}
                            @endif
                        </td>
                        <td>
                            @if ($ptkformtransaction->status == 5)
                                <button ptkformtrid="{{$ptkformtransaction->id}}" status="5" type="button" types="finalisasi" class="btnEditStatus btn btn-sm btn-outline-primary">
                                    <span class="badge bg-success">
                                        <i class="ti ti-square-check"></i>
                                    </span>
                                    <span class="badge bg-danger">
                                        <i class="ti ti-xbox-x"></i>
                                    </span>
                                </button>
                            @else
                                {{ $ptkformtransaction->finalisasi != null ? substr($ptkformtransaction->finalisasi,0,10) : '-' }}
                            @endif
                        </td>
                        <td>
                            @if ($ptkformtransaction->status == 6)
                                <button ptkformtrid="{{$ptkformtransaction->id}}" status="6" type="button" types="mcu" class="btnEditStatus btn btn-sm btn-outline-primary">
                                    <span class="badge bg-success">
                                        <i class="ti ti-square-check"></i>
                                    </span>
                                    <span class="badge bg-danger">
                                        <i class="ti ti-xbox-x"></i>
                                    </span>
                                </button>
                            @else
                                {{ $ptkformtransaction->mcu != null ? substr($ptkformtransaction->mcu,0,10) : '-' }}
                            @endif
                        </td>
                        <td>
                            @if ($ptkformtransaction->status == 7)
                                <button ptkformtrid="{{$ptkformtransaction->id}}" status="7" type="button" types="join" class="btnEditStatus btn btn-sm btn-outline-primary">
                                    <span class="badge bg-success">
                                        <i class="ti ti-square-check"></i>
                                    </span>
                                    <span class="badge bg-danger">
                                        <i class="ti ti-xbox-x"></i>
                                    </span>
                                </button>
                            @else
                                {{ $ptkformtransaction->join != null ? substr($ptkformtransaction->join,0,10) : '-' }}
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalEditStatus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title" id="exampleModalLabel">
                        <b>Update Status</b>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ url('ptkformtransactions/change-status') }}">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="ptkformtrid" id="ptkformtridModalEditStatus">
                        <input type="hidden" name="status" id="statusModalEditStatus">
                        <input type="hidden" name="type" id="typeModalEditStatus">

                        <input type="text" id="nameModalEditStatus" class="form-control mb-2" disabled>

                        <div class="form-group">
                            <label for="">Status</label>
                            <select name="statusokornot" class="form-select">
                                <option value="OK" selected disabled>Pilih Status</option>
                                <option value="OK">OK</option>
                                <option value="NOT OK">NOT OK</option>
                            </select>
                        </div>

                        <div class="form-group mt-1">
                            <label for="">Score</label>
                            <input type="number" value="0" name="score" class="form-control">
                        </div>

                        <div class="form-group mt-1">
                            <label for="">Keterangan</label>
                            <textarea class="form-control" name="keterangan" cols="2" rows="2"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
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

        $(".btnEditStatus").on("click", function() {
            $('#typeModalEditStatus').val($(this).attr('types'))
            $('#ptkformtridModalEditStatus').val($(this).attr('ptkformtrid'))
            $('#statusModalEditStatus').val($(this).attr('status'))
            $('#nameModalEditStatus').val($(this).attr('names'))

            $('#modalEditStatus').modal('show')
        });
    </script>
@endsection
