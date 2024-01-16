<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Job;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(){
//         ->take(8)
// Limits the number of fetched records to 8. It selects only the first 8 records based on the previous conditions.
        $Categories=Category::where('status',1)->orderBy('name','ASC')->take(8)->get();
        $featurejob=Job::where('status',1)->orderBy('created_at','desc')->with('jobType')->where('isFeatured',1)->take(6)->get();
        $latestjobs=Job::where('status',1)->orderBy('created_at','desc')->with('jobType')->take(6)->get();
        return view('front.home',['Categories'=>$Categories,'featurejob'=>$featurejob,'latestjobs'=>$latestjobs]);
    }

}
