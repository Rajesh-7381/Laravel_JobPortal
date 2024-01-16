@extends('front.layouts.app')

@section('main')
<section class="section-0 lazy d-flex bg-image-style dark align-items-center " class=""
    data-bg="assets/images/banner5.jpg">
    <div class="container">
        <div class="row">
            <div class="col-12 col-xl-8">
                <h1>Find your dream job</h1>
                <p>Thounsands of jobs available.</p>
                <div class="banner-btn mt-5"><a href="#" class="btn btn-primary mb-4 mb-sm-0">Explore Now</a></div>
            </div>
        </div>
    </div>
</section>
<section class="section-1 py-5 ">
    <div class="container">
        <div class="card border-0 shadow p-5">
            <div class="row">
                <div class="col-md-3 mb-3 mb-sm-3 mb-lg-0">
                    <input type="text" class="form-control" name="search" id="search" placeholder="Keywords">
                </div>
                <div class="col-md-3 mb-3 mb-sm-3 mb-lg-0">
                    <input type="text" class="form-control" name="search" id="search" placeholder="Location">
                </div>
                <div class="col-md-3 mb-3 mb-sm-3 mb-lg-0">
                    <select name="category" id="category" class="form-control">
                        <option value="">Select a Category</option>
                        <option value="">Engineering</option>
                        <option value="">Accountant</option>
                        <option value="">Information Technology</option>
                        <option value="">Fashion designing</option>
                    </select>
                </div>
                <div class="mb-4">
                    <h2>Job Type</h2>
                    <div class="form-check mb-2"> 
                        <input class="form-check-input " name="job_type" type="checkbox" value="1" id="">    
                        <label class="form-check-label " for="">Full Time</label>
                    </div>

                    <div class="form-check mb-2"> 
                        <input class="form-check-input school-section" name="job_type" type="checkbox" value="1" id="">    
                        <label class="form-check-label " for="">Part Time</label>
                    </div>

                    <div class="form-check mb-2"> 
                        <input class="form-check-input school-section" name="job_type" type="checkbox" value="1" id="">    
                        <label class="form-check-label " for="">Freelance</label>
                    </div>

                    <div class="form-check mb-2"> 
                        <input class="form-check-input school-section" name="job_type" type="checkbox" value="1" id="">    
                        <label class="form-check-label " for="">Remote</label>
                    </div>
                </div>

                <div class="mb-4">
                    <h2>Experience</h2>
                    <select name="category" id="category" class="form-control">
                        <option value="">Select Experience</option>
                        <option value="">1 Year</option>
                        <option value="">2 Years</option>
                        <option value="">3 Years</option>
                        <option value="">4 Years</option>
                        <option value="">5 Years</option>
                        <option value="">6 Years</option>
                        <option value="">7 Years</option>
                        <option value="">8 Years</option>
                        <option value="">9 Years</option>
                        <option value="">10 Years</option>
                        <option value="">10+ Years</option>
                    </select>
                </div> 

                <div class=" col-md-3 mb-xs-3 mb-sm-3 mb-lg-0">
                    <div class="d-grid gap-2">
                        <a href="jobs.html" class="btn btn-primary btn-block">Search</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-2 bg-2 py-5">
    <div class="container">
        <h2>Popular Categories</h2>
        <div class="row pt-5">
            @if($Categories->isNotEmpty())
            @foreach($Categories as $Category)

            <div class="col-lg-4 col-xl-3 col-md-6">
                <div class="single_catagory">
                    <a href="jobs.html">
                        <h4 class="pb-2">{{$Category->name}}e</h4>
                    </a>
                    <p class="mb-0"> <span>50</span> Available position</p>
                </div>
            </div>
            @endforeach
            @endif

        </div>
    </div>
</section>

<section class="section-3  py-5">
    <div class="container">
        <h2>Featured Jobs</h2>
        <div class="row pt-5">
            <div class="job_listing_area">
                <div class="job_lists">
                    <div class="row">
                        @if($featurejob->isNotEmpty())
                        @foreach($featurejob as $featurejobs)
                        <div class="col-md-4">
                            <div class="card border-0 p-3 shadow mb-4">
                                <div class="card-body">
                                    <h3 class="border-0 fs-5 pb-2 mb-0">{{$featurejobs->title}}</h3>
                                    <p>{{Str::words($featurejobs->description,10)}}.</p>
                                    <div class="bg-light p-3 border">
                                        <p class="mb-0">
                                            <span class="fw-bolder"><i class="fa fa-map-marker"></i></span>
                                            <span class="ps-1">{{$featurejobs->location}}</span>
                                        </p>
                                        <p class="mb-0">
                                            <span class="fw-bolder"><i class="fa fa-clock-o"></i></span>
                                            <span class="ps-1">{{$featurejobs->jobType->name}}</span>
                                        </p>
                                        @if(!is_null($featurejobs->salary))
                                            
                                        
                                        <p class="mb-0">
                                            <span class="fw-bolder"><i class="fa fa-usd"></i></span>
                                            <span class="ps-1">{{$featurejobs->salary}}</span>
                                        </p>
                                        @endif
                                    </div>

                                    <div class="d-grid mt-3">
                                        <a href="job-detail.html" class="btn btn-primary btn-lg">Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-3 bg-2 py-5">
    <div class="container">
        <h2>Latest Jobs</h2>
        <div class="row pt-5">
            <div class="job_listing_area">
                <div class="job_lists">
                    <div class="row">
                        @if($latestjobs->isNotEmpty())
                        @foreach($latestjobs as $latestjob)
                        <div class="col-md-4">
                            <div class="card border-0 p-3 shadow mb-4">
                                <div class="card-body">
                                    <h3 class="border-0 fs-5 pb-2 mb-0">{{$latestjob->title}}</h3>
                                    <p>{{Str::words($latestjob->description,10)}}.</p>
                                    <div class="bg-light p-3 border">
                                        <p class="mb-0">
                                            <span class="fw-bolder"><i class="fa fa-map-marker"></i></span>
                                            <span class="ps-1">{{$latestjob->location}}</span>
                                        </p>
                                        <p class="mb-0">
                                            <span class="fw-bolder"><i class="fa fa-clock-o"></i></span>
                                            <span class="ps-1">{{$latestjob->jobType->name}}</span>
                                        </p>
                                        @if(!is_null($latestjob->salary))
                                            
                                        
                                        <p class="mb-0">
                                            <span class="fw-bolder"><i class="fa fa-usd"></i></span>
                                            <span class="ps-1">{{$latestjob->salary}}</span>
                                        </p>
                                        @endif
                                    </div>

                                    <div class="d-grid mt-3">
                                        <a href="job-detail.html" class="btn btn-primary btn-lg">Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection