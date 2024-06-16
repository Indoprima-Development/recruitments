@extends('default')

@section('content')
@section('cardClass', 'bg-light-primary')
<div class="container-fluid note-has-grid">
    <div class="card bg-light-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">PTK</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="text-muted text-decoration-none"
                                    href="./index.html">Permintaan Tenaga Kerja</a></li>
                        </ol>
                    </nav>
                </div>
                <div class="col-3">
                    <div class="text-center mb-n5">
                        <img src="../../dist/images/breadcrumb/ChatBc.png" alt="" class="img-fluid mb-n4">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <ul class="nav nav-pills p-3 mb-3 rounded align-items-center card flex-row">
        <li class="nav-item">
            <a href="javascript:void(0)"
                class="
                nav-link

                note-link
                d-flex
                align-items-center
                justify-content-center
                active
                px-3 px-md-3
                me-0 me-md-2 text-body-color
              "
                id="all-category">
                <i class="ti ti-list fill-white me-0 me-md-1"></i>
                <span class="d-none d-md-block font-weight-medium">All Notes</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="javascript:void(0)"
                class="
                nav-link

                note-link
                d-flex
                align-items-center
                justify-content-center
                px-3 px-md-3
                me-0 me-md-2 text-body-color
              "
                id="note-business">
                <i class="ti ti-briefcase fill-white me-0 me-md-1"></i>
                <span class="d-none d-md-block font-weight-medium">Plant 1</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="javascript:void(0)"
                class="
                nav-link

                note-link
                d-flex
                align-items-center
                justify-content-center
                px-3 px-md-3
                me-0 me-md-2 text-body-color
              "
                id="note-social">
                <i class="ti ti-share fill-white me-0 me-md-1"></i>
                <span class="d-none d-md-block font-weight-medium">Plant 2</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="javascript:void(0)"
                class="
                nav-link

                note-link
                d-flex
                align-items-center
                justify-content-center
                px-3 px-md-3
                me-0 me-md-2 text-body-color
              "
                id="note-important">
                <i class="ti ti-star fill-white me-0 me-md-1"></i>
                <span class="d-none d-md-block font-weight-medium">Plant 5</span>
            </a>
        </li>
        <li class="nav-item ms-auto">
            <a href="{{ url('ptkforms/create') }}" class="btn btn-primary d-flex align-items-center px-3" id="add-notes">
                <i class="ti ti-file me-0 me-md-1 fs-4"></i>
                <span class="d-none d-md-block font-weight-medium fs-3">+ Form PTK</span>
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div id="note-full-container" class="note-has-grid row">
            @foreach ($ptkforms as $i => $ptkform)
                <div class="col-md-4 single-note-item all-category note-important">
                    <div class="card card-body">
                        <span class="side-stick"></span>
                        <h6 class="note-title text-truncate w-75 mb-0" data-noteHeading="Book a Ticket for Movie">
                            {{ $ptkform->jobtitle->jobtitle_name }}
                        </h6>
                        <p class="note-date fs-2">{{ $ptkform->division->division_name }}</p>
                        <div class="note-content">
                            <p class="note-inner-content"
                                data-noteContent="Blandit tempus porttitor aasfs. Integer posuere erat a ante venenatis.">
                                {{$ptkform->request_basis}}</p>
                        </div>
                        <div class="d-flex align-items-center">
                            @if ($ptkform->status == 0)
                                <span class="badge bg-primary">Dibuat</span>
                            @else
                                <span class="badge bg-success">Disetujui</span>
                            @endif
                            <div class="ms-auto">
                                <div class="category-selector btn-group">
                                    <a class="nav-link category-dropdown label-group p-0" data-bs-toggle="dropdown"
                                        href="#" role="button" aria-haspopup="true" aria-expanded="true">
                                        <div class="category">
                                            <div class="category-business"></div>
                                            <div class="category-social"></div>
                                            <div class="category-important"></div>
                                            <span class="more-options text-dark">
                                                <i class="ti ti-dots-vertical fs-5"></i>
                                            </span>
                                        </div>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right category-menu">
                                        <a class="dropdown-item position-relative category-social d-flex align-items-center" href="{{ route('ptkforms.show', [$ptkform->id]) }}">Show</a>

                                        <a class="
                            note-social
                            badge-group-item badge-social
                            dropdown-item
                            position-relative
                            category-social
                            d-flex
                            align-items-center
                          "
                                            href="{{ route('ptkforms.edit', [$ptkform->id]) }}"> Edit</a>
                                            {!! Form::open(['method' => 'DELETE', 'route' => ['ptkforms.destroy', $ptkform->id]]) !!}
                        {!! Form::submit('Delete', ['class' => 'note-important
                        badge-group-item badge-important
                        dropdown-item
                        position-relative
                        category-important
                        d-flex
                        align-items-center']) !!}
                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@stop

@section('addJs')
<script src="{{ asset('package/dist/js/apps/notes.js') }}"></script>
@endsection
