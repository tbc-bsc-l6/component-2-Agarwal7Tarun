<?php

namespace App\Http\Controllers;

use App\Mail\ResetPasswordEmail;
use App\Models\Category;
use App\Models\Job;
use App\Models\JobApplication;
use App\Models\JobType;
use App\Models\SavedJob;
use App\Models\User;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;



class AccountController extends Controller
{
    //This method will show user registration page
    public function registration(){
        return view('front.account.registration');
    }

    //This method will save user
    public function processRegistration(Request $request){
        $validator = Validator::make($request->all(),[
        'name' => 'required',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6|same:confirm_password',
        'confirm_password' => 'required',
        ]);
        if ($validator->passes()){

            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();
            
            session()->flash('success','You have registerd successfully. ');

            return response()->json([
                'status'=> true,
                'errors'=>[]
            ]);

        }else{
            return response()->json([
                'status'=> false,
                'errors'=>$validator->errors()
            ]);
        }
    }
    //This method will show user login page
    public function login(){
        return view('front.account.login');
    }

    public function authenticate(Request $request){

        $validator = Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if ($validator->passes()){
            if(Auth::attempt(['email'=> $request->email, 'password' => $request->password])){
                return redirect()->route('account.profile');
            }else{
                return redirect()->route('account.login')
                ->with('error','Either Email/Password is incorrect');
            }
        }else{
            return redirect()->route('account.login')
            ->withErrors($validator)
            ->withInput($request->only('email'));
        }
    }

    public function profile(){

        // here we will get user id, which user logged in
        $id = Auth::user()->id;
        $user = User::where('id',$id)->first();

        return view('front.account.profile',[
            'user' => $user,
        ]);
    }

     // update profile function
     public function updateProfile(Request $request){

        $id = Auth::user()->id;

        $validator = Validator::make($request->all(),[
            'name' => 'required|min:5|max:20',
            'email' => 'required|email|unique:users,email,'.$id.',id'
        ]);

        if($validator->passes()){

            $user = User::find($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->mobile = $request->mobile;
            $user->designation = $request->designation;
            $user->save();

            Session()->flash('success','Profile updated successfully');

            return response()->json([
                'status' => true,
                'errors' => [],
            ]);

        }else{
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }
    }
    
    
    public function logout(){
        Auth::logout();
        return redirect()->route('account.login');

    }

    public function updateProfileImg(Request $request){

        $id = Auth::user()->id;

        $validator = Validator::make($request->all(),[
            'image' => 'required|image'
        ]);
        if($validator->passes()){
            $image = $request->image;
            $ext = $image->getClientOriginalExtension();
            $imageName = $id.'-'.time().'.'.$ext;
            $image->move(public_path('/profile_img/'), $imageName);

            //Create Thumbnail
            $sourcePath = public_path('/profile_img/'.$imageName);
            $manager = new ImageManager(Driver::class);
            $image = $manager->read($sourcePath);

            // crop the best fitting 5:3 (600x360) ratio and resize to 600x360 pixel
            $image->cover(150, 150);
            $image->toPng()->save(public_path('/profile_img/thumb/'.$imageName));

            //Delete old profile images

            File::delete(public_path('/profile_img/thumb/'.Auth::user()->image));
            File::delete(public_path('/profile_img/'.Auth::user()->image));


            User::where('id',$id)->update(['image'=>$imageName]);

            session()->flash('success','Profile picture updated successfully');

            return response()->json([
                'status' => true,
                'errors' => []
            ]);
        }else{
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    public function createJob(){
        $categories = Category::orderBy('name','ASC')->where('status',1)->get();
        $job_types = JobType::orderBy('name','ASC')->where('status',1)->get();
        return view('front.account.job.create',[
            'categories' => $categories,
            'job_types' => $job_types,
        ]);
    }

    public function saveJob(Request $request){

        $rules = [
            'title' => 'required|min:5|max:200',
            'category' => 'required',
            'jobType' => 'required',
            'vacancy' => 'required|integer',
            'location' => 'required|max:50',
            'description' => 'required',
            'experience' => 'required',
            'company_name' => 'required|min:3|max:75',
        ];

        $validator = Validator::make($request->all(),$rules);
        if($validator->passes()){

            $job = new Job();
            $job->title = $request->title;
            $job->category_id = $request->category;
            $job->job_type_id = $request->jobType;
            $job->user_id = Auth::user()->id;
            $job->vacancy = $request->vacancy;
            $job->salary = $request->salary;
            $job->location = $request->location;
            $job->description = $request->description;
            $job->benefits = $request->benefits;
            $job->responsibility = $request->responsibility;
            $job->qualification = $request->qualification;
            $job->keywords = $request->keywords;
            $job->experience = $request->experience;
            $job->company_name = $request->company_name;
            $job->company_location = $request->company_location;
            $job->company_website = $request->company_website;
            $job->save();

            Session()->flash('success','Job added successfully.');
            return response()->json([
                'status' => true,
                'errors' => [],
            ]);
        }else{
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }
    }

        // Show all jobs
        public function myJobs(){
    
            $jobs = Job::where('user_id',Auth::user()->id)->with('jobType')->orderBy('created_at','DESC')->paginate(10);
            return view('front.account.job.my-jobs',[
                'jobs' => $jobs,
            ]);
        }
        // Controller Method to View All Applications for Logged-In User's Jobs
        public function viewJobApplications()
        {
            $userId = Auth::user()->id;
        
            if (!$userId) {
                abort(403, 'Unauthorized action.');
            }
        
            $applications = JobApplication::whereHas('job', function ($query) use ($userId) {
                $query->where('user_id', $userId);
            })->with(['user', 'job.jobType'])->paginate(10); // Paginate 10 records per page
        
            return view('front.account.job.view-applicants', [
                'applications' => $applications,
            ]);
        }
        // edit Job page
    public function editJob($id){
        $categories = Category::orderBy('name','ASC')->where('status',1)->get();
        $jobTypes = JobType::orderBy('name','ASC')->where('status',1)->get();

        // If user write another user id through url show him 404 page
        $job = Job::where([
            'user_id' => Auth::user()->id,
            'id' => $id,
        ])->first();

        if($job == null){
            abort(404);
        }

        return view('front.account.job.edit',[
            'categories' => $categories,
            'job_types' => $jobTypes,
            'job' => $job,
        ]);
    }

    // Update Job
    public function updateJob($jobId, Request $request){

        $rules = [
            'title' => 'required|min:5|max:200',
            'category' => 'required',
            'jobType' => 'required',
            'vacancy' => 'required|integer',
            'location' => 'required|max:50',
            'description' => 'required',
            'experience' => 'required',
            'company_name' => 'required|min:3|max:75',
        ];

        $validator = Validator::make($request->all(),$rules);
        if($validator->passes()){

            $job =Job::find($jobId);
            $job->title = $request->title;
            $job->category_id = $request->category;
            $job->job_type_id = $request->jobType;
            $job->user_id = Auth::user()->id;
            $job->vacancy = $request->vacancy;
            $job->salary = $request->salary;
            $job->location = $request->location;
            $job->description = $request->description;
            $job->benefits = $request->benefits;
            $job->responsibility = $request->responsibility;
            $job->qualification = $request->qualification;
            $job->keywords = $request->keywords;
            $job->experience = $request->experience;
            $job->company_name = $request->company_name;
            $job->company_location = $request->company_location;
            $job->company_website = $request->company_website;
            $job->save();

            Session()->flash('success','Job updated successfully.');
            return response()->json([
                'status' => true,
                'errors' => [],
            ]);

        }else{
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }
    }


    // This method will delete job
    public function deleteJob(Request $request){

        $job = Job::where([
            'user_id' => Auth::user()->id,
            'id' => $request->jobId,
        ])->first();

        if($job == null){
            Session()->flash('error','Either Job deleted or not found.');
            return response()->json([
                'status' => true,
            ]);
        }

        Job::where('id',$request->jobId)->delete();
        Session()->flash('success','Job deleted successfully.');
        return response()->json([
            'status' => true,
        ]);

    }
    public function myJobApplications(){

        $jobApplications = JobApplication::where('user_id',Auth::user()->id)->with(['job','job.jobType','job.applications'])->orderBy('created_at','DESC')->paginate(10);

        return view('front.account.job.my-job-application',[
            'jobApplications' => $jobApplications,
        ]);
    }


    // remove applied jobs
    public function removeJobs(Request $request){

        $jobApplication = JobApplication::where([
                                    'id' => $request->id,
                                    'user_id' => Auth::user()->id,]
                                )->first();
        if($jobApplication == null){
            Session()->flash('error','Job application not found');
            return response()->json([
                'status' => false,
            ]);
        }
        JobApplication::find($request->id)->delete();
        Session()->flash('success','Job application removed successfully.');
        return response()->json([
            'status' => true,
        ]);
    }

    // This function will show all saved jobs
    public function savedJobs(){
        $savedJobs = SavedJob::where([
            'user_id' => Auth::user()->id,
        ])->with(['job','job.jobType','job.applications'])->orderBy('created_at','DESC')->paginate(10);

        return view('front.account.job.saved-jobs',[
            'savedJobs' => $savedJobs,
        ]);
    }


        // remove saved jobs
        public function removeSavedJob(Request $request){

            $savedJob = SavedJob::where([
                                        'id' => $request->id,
                                        'user_id' => Auth::user()->id,]
                                    )->first();
            if($savedJob == null){
                Session()->flash('error','Job not found');
                return response()->json([
                    'status' => false,
                ]);
            }
            SavedJob::find($request->id)->delete();
            Session()->flash('success','Job removed successfully.');
            return response()->json([
                'status' => true,
            ]);
        }


        // Change password function
        public function changePassword(Request $request){
            $data = [
                'old_password' => 'required',
                'new_password' => 'required|min:5',
                'confirm_password' => 'required|same:new_password',
            ];
            $validator = Validator::make($request->all(),$data);
            if($validator->passes()){

                $user = User::select('id','password')->where('id',Auth::user()->id)->first();
                if(!Hash::check($request->old_password, $user->password)){

                    Session::flash('error','Your old password is incorrect, Please try again');
                    return response()->json([
                        'status' => true,
                    ]);
                }

                User::where('id', $user->id)->update([
                    'password' => Hash::make($request->new_password),
                ]);

                Session()->flash('success','Your have successfully change your password');
                return response()->json([
                    'status' => true,
                ]);

            }else{

                return response()->json([
                    'status' => false,
                    'errors' => $validator->errors(),
                ]);
            }
        }
}
