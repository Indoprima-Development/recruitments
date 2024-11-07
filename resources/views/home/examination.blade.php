@extends('default')

@section('content')
    <h5 class="card-title fw-semibold">Select Technical Test</h5>
    <p class="card-subtitle mb-3">Hard work is the key to success in every step you take.</p>

    <hr>
    <div class="row">
        <?php
        $arr = ['primary', 'success', 'dark', 'warning', 'danger'];
        ?>
        @forelse($data['exam'] as $i => $d)
            <div class="col-sm-6 col-md-3 mb-3">
                <div class="card bg-light-{{ $arr[$i % 5] }} overflow-hidden mb-4 mb-md-0 shadow-none border">

                    <div class="p-9 text-start">
                        <div class="d-flex align-items-center mt-3 justify-content-center">
                            <h5 class="mb-0">
                                <span class="text-dark fw-bold">{{ $d->exam_name }}</span>
                            </h5>
                        </div>
                        <button examId="{{ EncryptData($d->id) }}"
                            class="btn btn-{{ $arr[$i % 5] }} w-100 mt-3 btnConfirm">Take Selection</button>
                    </div>
                </div>
            </div>
        @empty
       <div class="col-12">
        Apply job first, to get technical test.
       </div>
        @endforelse
    </div>
@endsection

@section('addJs')
    <script>
        $(document).ready(function() {
            $(".btnConfirm").click(function() {
                let exam_id = $(this).attr('examId')
                Swal.fire({
                    title: "Are you sure?",
                    text: "To take this test",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#5D87FF",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes"
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = "{{ url('qna') }}/" + exam_id
                    }
                });
            });
        });
    </script>
@endsection
