<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Job;
use App\Models\JobType;
class JobsController extends Controller
{
        //This method will show jobs page
        public function index(Request $request){

            $categories = Category::where('status',1)->get();
            $jobTypes = JobType::where('status',1)->get();
    
            $jobs = Job::where('status',1);
    
            // Search using keyword
            if(!empty($request->keyword)){
                $jobs = $jobs->where(function($query) use($request){
                    $query->orWhere('title','like','%'.$request->keyword.'%');
                    $query->orWhere('keywords','like','%'.$request->keyword.'%');
                });
            }
    
            // Search using location
            if(!empty($request->location)){
                $jobs = $jobs->where('location', $request->location);
            }
    
            // Search using category
            if(!empty($request->category)){
                $jobs = $jobs->where('category_id', $request->category);
            }
    
            // Search using Job Types
            $jobTypeArray = [];
            if(!empty($request->jobType)){
                // your search will show like this 1,2,3 means you can search multiple job types by clicking on checkbox
                $jobTypeArray = explode(',',$request->jobType);
    
                $jobs = $jobs->whereIn('job_type_id', $jobTypeArray);
            }
    
            // Search using Job Experience
            if(!empty($request->experience)){
                $jobs = $jobs->where('experience', $request->experience);
            }
    
    
            $jobs = $jobs->with(['jobType','category']);
    
            if($request->sort == '0'){
    
                $jobs = $jobs->orderBy('created_at','ASC');
            }else{
    
                $jobs = $jobs->orderBy('created_at','DESC');
            }
    
            $jobs = $jobs->paginate(9);
    
    
            return view('front.jobs',[
                'categories' => $categories,
                'jobTypes' => $jobTypes,
                'jobs' => $jobs,
                'jobTypeArray' => $jobTypeArray,
            ]);
        }
    
        // This method will show job detail page
        public function jobDetail($id){
    
            $job = Job::where([
                            'id' => $id,
                            'status' => 1
                        ])->with(['jobType','category'])->first();
    
            if($job == null){
                abort(404);
            }
    
            $count = 0;
            if(Auth::user()){
                $count = SavedJob::where([
                    'user_id' => Auth::user()->id,
                    'job_id' => $id,
                ])->count();
            }
    
            // fetch applicants
            $applications = JobApplication::where('job_id', $id)->with('user')->get();
            return view('front.jobDetail',[
                 'job' => $job,
                 'count' => $count,
                 'applications' => $applications,
                ]);
        }
    
}
