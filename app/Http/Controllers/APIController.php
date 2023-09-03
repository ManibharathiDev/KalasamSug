<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\KCallRegister;
use App\Models\KstaffDtls;
use App\Models\KCustomerRegister;
use Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class APIController extends Controller
{
    //
    public function userregistration(Request $request)
    {
        try
        {
            $input = $request->all();
            $input['password'] = Hash::make($input['password']);
            $user = User::create($input);
            $result = array();
            $result['success'] = 1;
            $result['data']=$user;
            return json_encode($result);
           
        }
        catch(\Exception $e)
        {
            $result = array();
            $result['success'] = 0;
            $result['data']=$e;
            return json_encode($result);
        }
    }
    public function homepage(Request $request)
    {
        if(Auth::attempt(['name'=>$request->name,'password'=>$request->password]))
        {
            $user = Auth::user();
            $str_random=Str::random(12);
            return view('homepage',compact('str_random'));
            return json_encode($user);
        }
        else
        {
            echo "Invalid Login";
        }    
    }
    public function registerform() 
    { 
	    $str_random=Str::random(12);
	    return view('register',compact('str_random'));
    }
    public function loginpage() 
    { 
	    $str_random=Str::random(12);
	    return view('welcome',compact('str_random'));
    }
    public function home() 
    { 
	    $str_random=Str::random(12);
	    return view('homepage',compact('str_random'));
    }
    public function addcust() 
    { 
	    $str_random=Str::random(12);
	    return view('Customer/addcustomer',compact('str_random'));
    }
    public function custReport() 
    { 
         $calls = KCallRegister::get();
         $cust=KCustomerRegister::all();
         $data=User::all();
         return view('Calls/callsreport',compact('calls'),['data'=>$data,'cust'=>$cust]);
    }
    public function addcall()
    { 
	    $str_random=Str::random(12);
        $cust=KCustomerRegister::all();
        $data=User::all();
        return view('Calls/callregister',compact('str_random'),['cust'=>$cust,'data'=>$data]);
    }    
    public function addNewUser(Request $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email= $request->email;
        $user->password=bcrypt($request->password);
        $user->confirpassword=bcrypt($request->confirpassword);
        $user->usertype=$request->usertype;
        $user->save();
        $str_random=Str::random(12);
	    return view('welcome',compact('str_random'));
        echo "Register Successfully";
    }
    public function addcustomer(Request $request)
    {
        //$test=KCustomerRegister::whereget('comname');
        //print_r($test);
        //$test1=$request->comname;
        //echo($test);
        //echo($test1);
        $test2 = KCustomerRegister::where('comname',$request->comname)
        ->get();
        if(count($test2)>0)
        {
            echo "Already available";
            return;
        }
        try
        {
            DB::beginTransaction();
            $cust = new KCustomerRegister;
            $cust->comname = $request->comname;
            $cust->name = $request->name;
            $cust->phone = $request->phone;
            $cust->mobile = $request->mobile;
            $cust->email = $request->email;
            $cust->serialNo = $request->serialNo;
            $cust->gstno = $request->gstno;
            $cust->refname = $request->refname;
            $cust->pack = $request->pack;
            $cust->type=$request->type;
            //print_r($cust);
            $cust->save();
            DB::commit();	
            $str_random=Str::random(12);
            $cust=KCustomerRegister::all();
            $data=User::all();
            return view('Calls/callregister',compact('str_random'),['cust'=>$cust,'data'=>$data]);
            }
            catch(\Exception $e)
            {
                $result = array();
                $result['success'] = 0;
                $result['data']=$e;
                return json_encode($result);
            }
        
    }
    public function callregister(Request $request)
    {
        try
        {
            DB::beginTransaction();
            $calls = new KCallRegister;
            $calls->cust_id=$request->cust_id;
            $calls->Date = date('dMY');
            $calls->phoneno=$request->phoneno;
            $calls->conperson=$request->conperson;
            $calls->work=$request->work;
            $calls->staff_id=$request->staff_id;
            $calls->status=$request->status;
            $calls->remarks=$request->remarks;
            $calls->serialNo=$request->serialNo;
            $calls->Ncalldate=$request->Ncalldate;
            $calls->billtype=$request->billtype;
            $calls->completeperson=$request->completeperson;
            $calls->completeddate=$request->completeddate;
            //print_r($calls);
            $calls->save();
            DB::commit();	
            $str_random=Str::random(12);
	        return view('Calls/callregister',compact('str_random'));
        }
        catch(\Exception $e)
        {
            $result = array();
            $result['success'] = 0;
            $result['data']=$e;
            return json_encode($result);
        }
    }
    public function CallsReport(Request $request)
    {
        $calls = KCallRegister::distinct()->whereNotNull('phoneno')->get(['phoneno'])
        ->where('cust_id',$request->cust_id)
        ->where('status',$request->status)
        ->where('work',$request->work)
        ->where('type',$request->type)
        ->get();
         $cust  = KCustomerRegister::all();
         $data  = User::all();
         return view('Calls/callsreport',compact('calls'),['data'=>$data,'cust'=>$cust]);
    }
    public function UpdateCalls($id)
    {
        $calls = KCallRegister::find($id);
        $custid = $calls->cust_id;
        $staffid = $calls->staff_id;        
        $cust  = KCustomerRegister::find($custid);
        $data  = User::find($staffid);
        return view('Calls/editcallsregister',compact('calls'),['data'=>$data,'cust'=>$cust]);
    }
    public function updateregister(Request $request)
    {
        try
        {
            DB::beginTransaction();
            $calls = new KCallRegister;
            $calls->cust_id=$request->cust_id;
            $calls->Date = date('dMY');
            $calls->phoneno=$request->phoneno;
            $calls->conperson=$request->conperson;
            $calls->work=$request->work;
            $calls->staff_id=$request->staff_id;
            $calls->status=$request->status;
            $calls->remarks=$request->remarks;
            $calls->completeperson=$request->completeperson;
            $calls->completeddate=$request->completeddate;
            //print_r($calls);
            $calls->save();
            DB::commit();	
            $str_random=Str::random(12);
	        return view('Calls/callsreport',compact('str_random'));
        }
        catch(\Exception $e)
        {
            $result = array();
            $result['success'] = 0;
            $result['data']=$e;
            return json_encode($result);
        }
    }
}
