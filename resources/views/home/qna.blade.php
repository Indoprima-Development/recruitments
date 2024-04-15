@extends('default')

@section('addCss')
<style>
    .hiddenElement {
        display: none;
    }
</style>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card bg-light-warning shadow-none position-relative overflow-hidden">
                <div class="card-body px-4 py-3">
                    <div class="row">
                        <div class="col-sm-12 col-md-8">
                            <h4>
                                <span id="days">0</span> Days
                                <span id="hours">0</span> Hours
                                <span id="minutes">0</span> Minutes
                                <span id="seconds">0</span> Seconds
                            </h4>
                        </div>

                        <div class="col-sm-12 col-md-4 text-end">
                            <a href="{{url('submit-test',EncryptData($data['examTransaction']->id))}}" class="btn btn-primary">Finish Test</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card bg-light-info shadow-none position-relative overflow-hidden">
                <div class="card-body px-4 py-3">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <!-- <h4 class="fw-semibold mb-8">Cards</h4> -->
                            <div class="row">
                                @for($i=1;$i <= 20;$i++) <div class="col-1 mb-1">
                                    <div id="btnSoal{{$i}}" index="{{$i}}" class="bg-muted rounded-2 d-flex align-items-center justify-content-center p-6 btnSoal">
                                        <h4 class="text-white">{{$i}}</h4>
                                    </div>
                            </div>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-12 col-12 d-flex align-items-strech">
        <div class="card w-100">
            @foreach($data["qna"] as $key => $d)
            <div class="card-body p-4 cardQna" id="cardQna{{$key+1}}" index="{{$key+1}}" style="display: none;">
                <h5 class="card-title fw-semibold">{{$d->question}}</h5>
                <div class="row py-2">
                    @for($i=1;$i <= 5;$i++)<i></i>
                        <?php
                        $radioBtnId = "radio_" . $d->id . "_" . $i;
                        $radioBtnName = "radio_" . $d->id;
                        $radioBtnValue = EncryptData($d->id . "_" . $i . "_" . $d->key);
                        $radioBtnAnswerVar = "answer" . $i;
                        ?>
                        <div class="col-md-12 col-xl-12 mt-2">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input success inputAnswer" type="radio" name="{{$radioBtnName}}" id="{{$radioBtnId}}" value="{{$radioBtnValue}}">
                                <label class="form-check-label" for="{{$radioBtnId}}">{{$d->$radioBtnAnswerVar}}</label>
                            </div>
                        </div>
                        @endfor
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
</div>
@endsection

@section('addJs')
<script>
    $(document).ready(function() {
        makeElementShow(1)
        makeButtonActive(1)

        // Attach click event handler to the button with id "myButton"
        $(".btnSoal").click(function() {
            let index = $(this).attr("index")
            makeAllButtonNotActive()
            makeButtonActive(index)
            makeElementShow(index)
        });

        $(".inputAnswer").change(function() {
            let url = "{{url('qna-transaction')}}/" + $(this).val()
            $.get(url, function(data, status) {
                alert("answer saved")
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
    var targetDate = getCurrentDateWithOffset("{{$data['examTransaction']->time_remaining}}");

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
        var exam_id = "{{$data['examTransaction']->exam_id}}";
        let url = "{{url('update-time-remaining')}}/" + exam_id
        $.get(url, function(data, status) {
            if (data == true) {

            } else {
                var urlsubmit = "{{url('submit-test',EncryptData($data['examTransaction']->id))}}"
                window.location = urlsubmit
            }
        });
    }
    var y = setInterval(callAjax, 30000);

    $(document).on("contextmenu", function(e){
        e.preventDefault();
    });
</script>
@endsection