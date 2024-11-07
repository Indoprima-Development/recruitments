@extends('default')

@section('addCss')
    <style>
        .hiddenElement {
            display: none;
        }
    </style>
@endsection

<?php
$numbers = range(1, 20);
$answers = range(1, 5);
?>

@section('content2')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card bg-warning shadow-none position-relative overflow-hidden">
                    <div class="card-body px-4 py-3">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <h5 class="text-dark">
                                    <span id="days">0</span> <small>Days</small>
                                    <span id="hours">0</span> <small>Hours</small>
                                    <span id="minutes">0</span> <small>Minutes</small>
                                    <span id="seconds">0</span> <small>Seconds</small>
                                </h5>
                            </div>

                            <div class="col-sm-12 col-md-6 text-end">
                                <button id="btnSubmitTest" type="button" class="btn btn-outline-primary bg-white">Finish
                                    Test</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4">
                <div class="card bg-primary">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 text-center">
                                <h6 class="text-white">{{ $data['exam']->exam_name }}
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card shadow-none border-2">
                    <div class="card-body">
                        <h4 class="mb-3">Question Number</h4>
                        <p class="card-subtitle">
                            <small>Please choose one number to get the question</small>
                        </p>
                        <div class="vstack gap-3 mt-4">
                            <div class="row">
                                @foreach ($numbers as $i)
                                    <div class="col-2 mb-2">
                                        <a id="btnSoal{{ $i }}" index="{{ $i }}"
                                            class="btnSoal btn btn-muted p-0 hstack justify-content-center"
                                            href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-title="Choose">
                                            <h4 class="text-white">{{ $i }}</h4>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                @foreach ($data['qna'] as $key => $d)
                    <div style="display: none;" id="cardQna{{ $key + 1 }}" index="{{ $key + 1 }}" class="cardQna">
                        <div class="card bg-light-primary">
                            <div class="card-body border-bottom">
                                <div class="d-flex align-items-center gap-6 flex-wrap">
                                    <h6 class="text-primary">
                                        <b>QUESTION</b>
                                    </h6>
                                </div>
                                <hr>
                                <p class="text-dark my-3">
                                    {{ $d->question }}
                                </p>

                                @if ($d->question_img != '' && $d->question_img != null)
                                    <div class="row">
                                        <div class="col-12">
                                            <img src="{{ asset($d->question_img) }}" alt="modernize-img" width="100%"
                                                class="rounded-4 w-100 object-fit-cover">
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <h6 class="text-primary">
                            <b>ANSWER</b>
                        </h6>
                        <hr>

                        <div class="row">
                            @foreach ($answers as $i)
                                <?php
                                $radioBtnId = 'radio_' . $d->id . '_' . $i;
                                $radioBtnName = 'radio_' . $d->id;
                                $radioBtnValue = EncryptData($d->id . '_' . $i . '_' . $d->key);
                                $radioBtnAnswerVar = 'answer' . $i;
                                $imageAnswerVar = "answer$i" . '_img';
                                ?>
                                <div class="col-sm-12 col-12 card border-1 border-primary">
                                    <div class="card-body border-bottom">
                                        <div class="d-flex align-items-center gap-6 flex-wrap">
                                            @if ($d->qnaTransaction != null && $i == $d->qnaTransaction->answer)
                                                <input class="form-check-input primary rounded-circle inputAnswer"
                                                    width="40" height="40" type="radio" name="{{ $radioBtnName }}"
                                                    id="{{ $radioBtnId }}" value="{{ $radioBtnValue }}" checked>
                                            @else
                                                <input class="form-check-input primary rounded-circle inputAnswer"
                                                    width="40" height="40" type="radio" name="{{ $radioBtnName }}"
                                                    id="{{ $radioBtnId }}" value="{{ $radioBtnValue }}">
                                            @endif
                                            <label class="form-check-label" for="{{ $radioBtnId }}">
                                                <h6 class="mb-0">{{ $d->$radioBtnAnswerVar }}</h6>
                                            </label>
                                        </div>

                                        @if ($d->$imageAnswerVar != '' && $d->$imageAnswerVar != null)
                                            <div class="row">
                                                <div class="col-12">
                                                    <img src="{{ asset($d->$imageAnswerVar) }}" alt="modernize-img"
                                                        width="100%" class="rounded-4 w-100 object-fit-cover">
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="col-xl-12 col-12 d-flex align-items-strech">
            <div class="card w-100">
                @foreach ($data['qna'] as $key => $d)
                    <div class="card-body p-4" style="display: none;">
                        <h5 class="card-title fw-semibold">{{ $d->question }}</h5>
                        <div class="row py-2">
                            @for ($i = 1; $i <= 5; $i++)
                                <i></i>
                                <?php
                                $radioBtnId = 'radio_' . $d->id . '_' . $i;
                                $radioBtnName = 'radio_' . $d->id;
                                $radioBtnValue = EncryptData($d->id . '_' . $i . '_' . $d->key);
                                $radioBtnAnswerVar = 'answer' . $i;
                                ?>
                                <div class="col-md-12 col-xl-12 mt-2">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input success inputAnswer" type="radio"
                                            name="{{ $radioBtnName }}" id="{{ $radioBtnId }}"
                                            value="{{ $radioBtnValue }}">
                                        <label class="form-check-label"
                                            for="{{ $radioBtnId }}">{{ $d->$radioBtnAnswerVar }}</label>
                                    </div>
                                </div>
                            @endfor
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="col-xl-12 col-12 text-end mt-n4">
            <button class="btn btn-primary" type="button" id="btnNext">
                Next
            </button>
        </div>
    </div>
    </div>
@endsection

@section('addJs')
    <script>
        var currentNumbers = 1;
        $(document).ready(function() {
            makeElementShow(1)
            makeButtonActive(1)

            $("#btnNext").click(function() {
                let next = parseInt(currentNumbers) + 1;
                if (next > 20) {
                    next = 1;
                    currentNumbers = 1;
                }
                $("#btnSoal" + next.toString()).click();
            });


            // Attach click event handler to the button with id "myButton"
            $(".btnSoal").click(function() {
                let index = $(this).attr("index")
                currentNumbers = index;
                makeAllButtonNotActive()
                makeButtonActive(index)
                makeElementShow(index)
            });

            $(".inputAnswer").change(function() {
                let url = "{{ url('qna-transaction') }}/" + $(this).val()
                $.get(url, function(data, status) {
                    // alert("answer saved")
                });
            });

            $("#btnSubmitTest").click(function() {
                Swal.fire({
                    title: "Are you sure to finish this test?",
                    text: "you can't take this test twice",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#5D87FF",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes"
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location =
                            "{{ url('submit-test', EncryptData($data['examTransaction']->exam_id)) }}"
                    }
                });
            });
        });

        function makeAllButtonNotActive() {
            $(".btnSoal").removeClass("bg-muted");
            $(".btnSoal").removeClass("bg-primary");
            $(".btnSoal").addClass("bg-muted");
        }

        function makeButtonActive(index) {
            $("#btnSoal" + index).removeClass("bg-muted").addClass("bg-primary");
        }

        function makeElementShow(index) {
            $(".cardQna").hide();
            $("#cardQna" + index).show();
        }
    </script>

    <script>
        function getCurrentDateWithOffset(minutes) {
            var currentDate = new Date();
            currentDate.setTime(currentDate.getTime() + (minutes * 60 * 1000)); // Adding minutes in milliseconds
            return currentDate;
        }
        // Set the target date
        var targetDate = getCurrentDateWithOffset("{{ $data['examTransaction']->time_remaining }}");

        // Update the countdown every second
        var x = setInterval(function() {
            // Get the current date and time
            var now = new Date().getTime();

            // Calculate the remaining time
            var distance = targetDate - now;

            // Calculate days, hours, minutes, and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Display the countdown
            $("#days").text(days);
            $("#hours").text(hours);
            $("#minutes").text(minutes);
            $("#seconds").text(seconds);

            // If the countdown is over, display a message
            if (distance < 0) {
                clearInterval(x);
                $("#days").text("0");
                $("#hours").text("0");
                $("#minutes").text("0");
                $("#seconds").text("0");
                // You can display a message or take any other action here
            }
        }, 1000);

        function callAjax() {
            var exam_id = "{{ $data['examTransaction']->exam_id }}";
            let url = "{{ url('update-time-remaining') }}/" + exam_id
            $.get(url, function(data, status) {
                if (data == true) {

                } else {
                    var urlsubmit = "{{ url('submit-test', EncryptData($data['examTransaction']->exam_id)) }}"
                    window.location = urlsubmit
                }
            });
        }
        var y = setInterval(callAjax, 30000);

        $(document).on("contextmenu", function(e) {
            e.preventDefault();
        });
    </script>
@endsection
