@extends('authentication_layout.authentication')
@section('page_title', 'Page Title')

@section('content')

    <script>
        $(document).ready(function() {
            countDownReverse();
            $("#otpSumit").click(function() {
                otpSumit();
            });
        });

        function otpSumit() {
            var postdata = jQuery('#otp_form').serialize() + "&_token=" + jQuery('meta[name="csrf-token"]').attr(
                'content');
            jQuery.ajax({
                type: "POST",
                cache: false,
                url: "{{ url('/') }}/otp",
                data: postdata,
                datatype: "json",
                success: function(response) {

                    console.log(response);


                }
            });

        }
        function countDownReverse() {
            let seconds = 300;
            const interval = setInterval(function() {
                seconds--;

                if (seconds >= 0) {
                    $("#count_revarse").html(seconds + " second");
                    $("#previusCount").val(seconds);
                    if (seconds == 0) {
                        $("#count_revarse").empty();
                        $('#count_revarse').hide();
                        $('#resent_div').show();
                    }
                } else {
                    clearInterval(interval);
                }
            }, 1000);
        }
    </script>
 
    {{-- style="display: none;" --}}
    <div id="div_for_otp">
        <h2>Verify</h2>
        <form id="otp_form" action="#" method="post">
            <div style="display: none;" id="alert_mail" class="alert alert-primary" role="alert">
                <span id="mail_alert"></span>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label for="otp_code">Code</label>
                    </div>
                    <div class="col-md-6">
                        <span id="count_revarse" class="float-right"></span>

                        <div class="float-right" id="resent_div" style="display: none;">
                            <button type="button" class="btn">Resend</button>
                        </div>
                    </div>
                </div>

                <input type="hidden" name="email_address_otp" id="email_address_otp" value="">

                <input type="text" class="form-control" id="otp_code" name="otp_code" maxlength="6">


                <small id="otp_code-error" style="color: red;"></small>
            </div>
            <button type="button" id="otpSumit" class="btn btn-primary">Submit</button>
            <div class="loading_div">
                <span style="text-align: center;display:none;" id="otpSumit_loading"> <img
                        src="{{ asset('') }}public/image/loadingimage.gif"></span>
            </div>
        </form>
    </div>
@endsection
