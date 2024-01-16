@extends('front.layouts.app')

@section('main')
<section class="section-5 bg-2">
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class=" rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Account Settings</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                @include('front.account.sidebar')
            </div>
            <div class="col-lg-9">
                @include('front.message')
                <form action="" id="createjobform" name="createjobform" method="post">
                    <div class="card border-0 shadow mb-4 ">
                        <div class="card-body card-form p-4">
                            <h3 class="fs-4 mb-1">Job Details</h3>
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label for="" class="mb-2">Title<span class="req">*</span></label>
                                    <input type="text" placeholder="Job Title" id="title" name="title" class="form-control">
                                    <p></p>
                                </div>
                                <div class="col-md-6  mb-4">
                                    <label for="" class="mb-2">Category<span class="req">*</span></label>
                                    <select name="category" id="category" class="form-control">
                                        <option value="">Select a Category</option>
                                        @if($categories->isNotEmpty())
                                            @foreach($categories as  $Category)
                                                <option value="{{$Category->id}}">{{$Category->name}}</option>
                                            @endforeach
                                        @endif
                                        
                                    </select>
                                    <p></p>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label for="" class="mb-2">Job Type<span class="req">*</span></label>
                                    <select class="form-select" id="jobtype" name="jobtype">
                                        <option value="">Select a Job</option>
                                        @if($jobtypes->isNotEmpty())
                                            @foreach($jobtypes as  $jobtype)
                                                <option value="{{$jobtype->id}}">{{$jobtype->name}}</option>
                                            @endforeach
                                        @endif
                                        
                                    </select>
                                    <p></p>
                                </div>
                                <div class="col-md-6  mb-4">
                                    <label for="" class="mb-2">Vacancy<span class="req">*</span></label>
                                    <input type="number" min="1" placeholder="Vacancy" id="vacancy" name="vacancy" class="form-control">
                                    <p></p>
                                </div>
                            </div>
    
                            <div class="row">
                                <div class="mb-4 col-md-6">
                                    <label for="" class="mb-2">Salary</label>
                                    <input type="text" placeholder="Salary" id="salary" name="salary" class="form-control">
                                    <p></p>
                                </div>
    
                                <div class="mb-4 col-md-6">
                                    <label for="" class="mb-2">Location<span class="req">*</span></label>
                                    <input type="text" placeholder="location" id="location" name="Location" class="form-control">
                                    <p></p>
                                </div>
                            </div>
    
                            <div class="mb-4">
                                <label for="" class="mb-2">Description<span class="req">*</span></label>
                                <textarea class="form-control" name="description" id="description" cols="5" rows="5" placeholder="Description"></textarea>
                                <p></p>
                            </div>
                            <div class="mb-4">
                                <label for="" class="mb-2">Benefits</label>
                                <textarea class="form-control" name="benefits" id="benefits" cols="5" rows="5" placeholder="Benefits"></textarea>
                                <p></p>
                            </div>
                            <div class="mb-4">
                                <label for="" class="mb-2">Responsibility</label>
                                <textarea class="form-control" name="responsibility" id="responsibility" cols="5" rows="5" placeholder="Responsibility"></textarea>
                                <p></p>
                            </div>
                            <div class="mb-4">
                                <label for="" class="mb-2">Qualifications</label>
                                <textarea class="form-control" name="qualifications" id="qualifications" cols="5" rows="5" placeholder="Qualifications"></textarea>
                                <p></p>
                            </div>
                            <div class="mb-4">
                                <label for="" class="mb-2">Exprience<span class="req">*</span></label>
                                <select name="exprience" id="exprience">
                                   
                                    <option value="1">1 year</option>
                                    <option value="2">2 year</option>
                                    <option value="3">3 year</option>
                                    <option value="4">4 year</option>
                                    <option value="5">5 year</option>
                                    <option value="6">6 year</option>
                                    <option value="7">7 year</option>
                                    <option value="8">8 year</option>
                                    <option value="9">9 year</option>
                                    <option value="10">10 year</option>
                                    <option value="10+">10+ year</option>
                                </select>
                                <p></p>
                            </div>
                            
                            
    
                            <div class="mb-4">
                                <label for="" class="mb-2">Keywords</label>
                                <input type="text" placeholder="keywords" id="keywords" name="keywords" class="form-control">
                                <p></p>
                            </div>
    
                            <h3 class="fs-4 mb-1 mt-5 border-top pt-5">Company Details</h3>
    
                            <div class="row">
                                <div class="mb-4 col-md-6">
                                    <label for="" class="mb-2">Name<span class="req">*</span></label>
                                    <input type="text" placeholder="Company Name" id="company_name" name="company_name" class="form-control">
                                    <p></p>
                                </div>
    
                                <div class="mb-4 col-md-6">
                                    <label for="" class="mb-2">Location</label>
                                    <input type="text" placeholder="Location" id="location" name="location" class="form-control">
                                    <p></p>
                                </div>
                            </div>
    
                            <div class="mb-4">
                                <label for="" class="mb-2">Website</label>
                                <input type="text" placeholder="Website" id="website" name="website" class="form-control">
                                <p></p>
                            </div>
                        </div> 
                        <div class="card-footer  p-4">
                            <button type="submit" class="btn btn-primary">Save Job</button>
                        </div>               
                    </div> 
                </form>

            </div>
        </div>
    </div>
</section>

@endsection
@section('customJs')
<script>
    $("#createjobform").submit(function(e){
        e.preventDefault();
        // console.log($("#createjobform").serialize());
        // return false;

        $.ajax({
            url: '{{ route("account.savejob") }}',
            type: 'post', // Use 'post' method for form submission
            
            data: $("#createjobform").serialize(), // Serialize the form data
            dataType: 'json',
            success: function(response) {
                if (response.status == true) {
                    $("#title").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');
                     $("#category").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');
                     $("#jobtype").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');
                     $("#vacancy").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');
                     $("#Location").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');
                     $("#description").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');
                     $("#vacancy").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');
                     $("#company_name").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');
                    // Handle success
                    // alert('Profile updated successfully!');
                    window.location.href="{{route('account.myjobs')}}";
                } else {
                    var errors = response.errors;

                    // Handle errors for each field
                    if (errors.title) {
                        // Handle name field error
                        $("#title").addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors.title);
                    } else {
                        $("#title").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');
                    }

                    if (errors.category) {
                        // Handle category field error
                        $("#category").addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors.category);
                    } else {
                        $("#category").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');
                    }
                    if (errors.jobtype) {
                        // Handle jobtype field error
                        $("#jobtype").addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors.jobtype);
                    } else {
                        $("#jobtype").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');
                    }
                    if (errors.vacancy) {
                        // Handle vacancy field error
                        $("#vacancy").addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors.vacancy);
                    } else {
                        $("#vacancy").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');
                    }
                    if (errors.Location) {
                        // Handle Location field error
                        $("#Location").addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors.Location);
                    } else {
                        $("#Location").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');
                    }
                    if (errors.description) {
                        // Handle description field error
                        $("#description").addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors.description);
                    } else {
                        $("#description").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');
                    }
                   
                    // Handle other fields similarly
                }
            },
            error: function(xhr, status, error) {
                // Handle AJAX errors if any
                console.error(xhr);
            }
        });
    });
</script>

@endsection