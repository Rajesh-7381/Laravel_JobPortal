<?php

namespace App\Http\Controllers;

use App\Mail\JobNotificationMail;
use App\Models\Category;
use App\Models\Job;
use App\Models\job_app;
use App\Models\JobType;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

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
            $jobs = $jobs->where(function ($query) use ($request) {
                $query->orWhere('title', 'like', '%' . $request->keyword . '%');
                $query->orWhere('keywords', 'like', '%' . $request->keyword . '%');
            });
        }
        // search using location
        if (!empty($request->location)) {
            $jobs = $jobs->where('location', $request->location);
        }
        // search using category
        if (!empty($request->category)) {
            $jobs = $jobs->where('category_id', $request->category);
        }
        // search using jobtype
        $jobtypesarray = [];
        if (!empty($request->jobType)) {
            $jobtypesarray = explode(',', $request->jobType);
            $jobs = $jobs->whereIn('job_type_id', $jobtypesarray);
        }
        // search using experience
        if (!empty($request->experience)) {
            $experiencearray = explode(',', $request->experience);
            $jobs = $jobs->where('experience', $experiencearray);
        }

        // Continue building the query, ordering and paginating
        // $jobs = $jobs->with(['jobType','category'])->orderBy('created_at', 'DESC')->paginate(9);
        $jobs = $jobs->with(['jobType', 'category']);
        if ($request->sort == '0') {
            $jobs = $jobs->orderBy('created_at', 'ASC');
        } else {
            $jobs = $jobs->orderBy('created_at', 'DESC');
        }
        $jobs = $jobs->paginate(9);

        return view('front.jobs', ['categories' => $categories, 'jobtypes' => $jobtypes, 'jobs' => $jobs, 'jobtypesarray' => $jobtypesarray]);
    }
    // this method will show job detail page
    public function detail($id)
    {
        $job = Job::where([
            'id' => $id,
            'status' => 1
        ])->with(['JobType', 'Category'])->first();
        // dd($job);
        if ($job == null) {
            abort(404);
        } else {
        }
        return view('front.jobdetail', ['job' => $job]);
    }
    public function applyJob(Request $request)
    {
        $id = $request->id;
        $job = Job::where('id', $id)->first();
        if ($job == null) {
            Session::flash('error', 'job does not exists!!');
            return response()->json([

                'status' => false,
                'message' => 'job does not exists!'
            ]);
        }
        // you cant your apply own job
        $employer_id = $job->user_id;
        if ($employer_id == Auth::user()->id) {
            Session::flash('error', 'you cant your apply own job!');
            return response()->json([

                'status' => false,
                'message' => 'you cant your apply own job!'
            ]);
        }
        // you can not apply jobs twice
        $jobapplication=job_app::where([
            
            'user_id'=>Auth::user()->id,
            'job_id'=>$id        
        ])->count();
        if($jobapplication > 0){
            Session::flash('error', 'you already applied this job!');
            return response()->json([

                'status' => false,
                'message' => 'you already applied this job!'
            ]);
        }
        $application = new job_app();
        $application->job_id = $id;
        $application->employer_id = $employer_id; // Corrected this line
        $application->applied_date = now();
        $application->user_id = Auth::user()->id;
        $application->save();
        // send notification to employer
        $employer=User::where('id',$employer_id)->first();
        $maildata=[
            'employer'=>$employer,
            'user'=>Auth::user(),
            'job'=>$job,
        ];
        Mail::to($employer->email)->send(new JobNotificationMail($maildata));

        Session::flash('success', 'you have to applied to this job!');
        return response()->json([

            'status' => true,
            'message' => 'you can apply to this job!'
        ]);
    }
}
