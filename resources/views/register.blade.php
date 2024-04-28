@extends('authentication_layout.authentication')
@section('page_title', 'Register')

@section('content')
    <script>
        $(document).ready(function() {
            $("#btnSumit").click(function() {
                submit_action_Function();
            });
            $("#otpSumit").click(function() {
                otpSumit();
            });
        });

        function submit_action_Function() {
            $('#btnSumit').hide();
            $('#btnSumit_loading').show();
            var postdata = jQuery('#registration_form').serialize() + "&_token=" + jQuery('meta[name="csrf-token"]').attr(
                'content');
            jQuery.ajax({
                type: "POST",
                cache: false,
                url: "{{ url('/') }}/registration",
                data: postdata,
                datatype: "json",
                success: function(response) {
                    jQuery('meta[name="csrf-token"]').attr('content', response.csrf_token);

                    if (response.status == "notOk") {
                        $("#email_validation").html(response.message);
                        $("#email_address").addClass("is-invalid");
                    } else {

                        $("#email_validation").empty();
                        $("#email_address").removeClass("is-invalid");
           
                        $('#registration_form').hide();
                        $('#alert_mail').show();
                        $('#sended_mail').html("OTP sent successfully This Mail : " + response.email_address);
                        $('#email_address_otp').val(response.email_address);

                        window.location.href = "{{ route('otp_form') }}" ;



                    }


                    $('#btnSumit_loading').hide();
                    $('#btnSumit').show();
                },

                error: function(xhr, status, error) {
                    if (xhr.status == 422) {
                        var errors = xhr.responseJSON.errors;
                        $.each(errors, function(key, value) {
                            $("#" + key + "-error").text(value);
                        });
                    }
                    $('#btnSumit_loading').hide();
                    $('#btnSumit').show();
                }
            });
        }
    </script>

    <div id="registration_section">
        <h2>Registration Form</h2>


        <div id="alert_mail" style="display: none;" class="alert alert-info mt-3" role="alert">
            <span id="sended_mail"></span>
          </div>
          


        <form id="registration_form" action="#" method="post">
            <div class="form-group">
                <label for="firstname">First Name</label>
                <input type="text" class="form-control" id="firstname" name="firstname">
                <small id="firstname-error" style="color: red;"></small>
            </div>
            <div class="form-group">
                <label for="lastname">Last Name</label>
                <input type="text" class="form-control" id="lastname" name="lastname">
                <small id="lastname-error" style="color: red;"></small>
            </div>
            <div class="form-group">
                <label for="mobile_number">Phone Number</label>
                <input type="text" class="form-control" id="mobile_number" name="mobile_number">
                <small id="mobile_number-error" style="color: red;"></small>
            </div>
            <div class="form-group">
                <label for="email_address">Email address</label>
                <input type="email" class="form-control" id="email_address" name="email_address">
                <small style="color: red;" id="email_validation"></small>
                <small id="email_address-error" style="color: red;"></small>
            </div>
            <div class="form-group">
                <label for="Password">Password</label>
                <input type="password" class="form-control" id="password" name="password">
                <small id="password-error" style="color: red;"></small>
            </div>
            <button type="button" id="btnSumit" class="btn btn-primary">Sign up</button>

            <div class="loading_div" style="text-align: center;">
                <span style="text-align: center;display:none;" id="btnSumit_loading">Please wait... <img
                        src="{{ asset('') }}public/image/loadingimage.gif"></span>
            </div>
        </form>
    </div>
@endsection
