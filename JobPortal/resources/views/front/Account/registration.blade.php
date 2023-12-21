@extends('front.layouts.app')

@section('main')
<section class="section-5">
    <div class="container my-5">
        <div class="py-lg-2">&nbsp;</div>
        <div class="row d-flex justify-content-center">
            <div class="col-md-5">
                <div class="card shadow border-0 p-5">
                    <h1 class="h3">Register</h1>
                    <form action="" name="registrationform" id="registrationform">
                        <div class="mb-3">
                            <label for="" class="mb-2">Name*</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name">
                            <p></p>
                        </div> 
                        <div class="mb-3">
                            <label for="" class="mb-2">Email*</label>
                            <input type="text" name="email" id="email" class="form-control" placeholder="Enter Email" autocomplete="username">
                            <p></p>
                        </div> 
                        <div class="mb-3">
                            <label for="" class="mb-2">Password*</label>
                            <input type="password" name="Password" id="Password" class="form-control" placeholder="Enter Password" autocomplete="new-password">
                            <p></p>
                        </div> 
                        <div class="mb-3">
                            <label for="" class="mb-2">Confirm Password*</label>
                            <input type="password" name="Confirm_Password" id="Confirm_Password" class="form-control" placeholder="Enter confirm Password" autocomplete="new-password">
                            <p></p>
                        </div> 
                        <button class="btn btn-primary mt-2">Register</button>
                    </form>                    
                </div>
                <div class="mt-4 text-center">
                    <p>Have an account? <a  href="{{route('account.login')}}">Login</a></p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('customJs')
<script>
  $("#registrationform").submit(function(e){
    e.preventDefault();

    $.ajax({
        url: '{{ route("account.processregistration") }}',
        type: 'post',
        data: $("#registrationform").serializeArray(),
        dataType: 'json',
        success: function(response) {
            if (response.status == false) {
                var errors = response.errors;
                
                // Handle errors for each field
                if (errors.name) {
                    // Handle name field error
                    $("#name").addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors.name);
                } else {
                    $("#name").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');
                }

                if (errors.email) {
                    // Handle email field error
                    $("#email").addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors.email);
                } else {
                    $("#email").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');
                }

                if (errors.Password) {
                    // Handle password field error
                    $("#Password").addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors.Password);
                } else {
                    $("#Password").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');
                }

                if (errors.Confirm_Password) {
                    // Handle confirm password field error
                    $("#Confirm_Password").addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors.Confirm_Password);
                } else {
                    $("#Confirm_Password").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');
                }
            }else{
                $("#name").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');
                $("#email").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');
                $("#Password").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');
                $("#Confirm_Password").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');
                window.location.href = '{{ route("account.login") }}';

            }
        },
        error: function(xhr, status, error) {
            // Handle AJAX errors if any
        }
    });
});

</script>
@endsection