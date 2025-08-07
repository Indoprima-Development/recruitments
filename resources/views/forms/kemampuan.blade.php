<div class="tab-pane fade show" id="pills-kemampuan" role="tabpanel" aria-labelledby="pills-account-tab" tabindex="0">
    <div class="row">
        <div class="col-12">
            <div class="card w-100 position-relative overflow-hidden mb-0 bg-white">
                <div class="card-body p-4">
                    <h5 class="card-title fw-semibold">Kemampuan</h5>
                    <div class="row">
                        <div class="d-flex justify-content-end mb-3"><a href="{{ url('datakemampuans/create') }}"
                                class="btn btn-info">+ Tambah Data</a></div>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kemampuan</th>
                                    <th>Level</th>

                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datakemampuans as $i => $datakemampuan)
                                    <tr>
                                        <td>{{ $i+1 }}</td>
                                        <td>{{ $datakemampuan->kemampuan }}</td>
                                        <td>{{ $datakemampuan->level }}</td>

                                        <td>
                                            <div class="d-flex gap-2">
                                                {!! Form::open(['method' => 'DELETE', 'route' => ['datakemampuans.destroy', Crypt::encryptString($datakemampuan->id)]]) !!}
                                                {!! Form::submit('Delete', ['class' => 'btn btn-sm btn-danger']) !!}
                                                {!! Form::close() !!}
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
