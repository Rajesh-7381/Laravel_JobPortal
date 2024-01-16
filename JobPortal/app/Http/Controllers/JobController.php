<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Job;
use App\Models\JobType;
use Illuminate\Http\Request;

class JobController extends Controller
{
    // This method will show the jobs page
    public function index(Request $request)
    {
        $categories = Category::where('status', 1)->get();
        $jobtypes = JobType::where('status', 1)->get();
        
        // Start with the base query
        $jobs = Job::where('status', 1);

        // Search using keyword
        if (!empty($request->keyword)) {
            $jobs = $jobs->where(function($query) use ($request) {
                $query->orWhere('title', 'like', '%' . $request->keyword . '%');
                $query->orWhere('keywords', 'like', '%' . $request->keyword . '%');
            });
        }
        // search using location
        if(!empty($request->location)){
            $jobs=$jobs->where('location',$request->location);
        }
        // search using category
        if(!empty($request->category)){
            $jobs=$jobs->where('category_id',$request->category);
        }
        // search using jobtype
        $jobtypesarray=[];
        if(!empty($request->jobType)){
            $jobtypesarray=explode(',',$request->jobType);
            $jobs=$jobs->whereIn('job_type_id',$jobtypesarray);
        }
        // search using experience
        if(!empty($request->experience)){
            $experiencearray=explode(',',$request->experience);
            $jobs=$jobs->where('experience',$experiencearray);
        }

        // Continue building the query, ordering and paginating
        // $jobs = $jobs->with(['jobType','category'])->orderBy('created_at', 'DESC')->paginate(9);
        $jobs = $jobs->with(['jobType','category']);
        if( $request->sort == '0'){
            $jobs = $jobs->orderBy('created_at', 'ASC');
        }else{
            $jobs = $jobs->orderBy('created_at', 'DESC');
        }
        $jobs = $jobs->paginate(9);

        return view('front.jobs', ['categories' => $categories, 'jobtypes' => $jobtypes, 'jobs' => $jobs,'jobtypesarray'=>$jobtypesarray]);
    }
}
