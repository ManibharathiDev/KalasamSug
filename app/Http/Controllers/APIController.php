<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\KCallRegister;
use App\Models\KstaffDtls;
use App\Models\KCustomerRegister;
use Validator;
use Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class APIController extends Controller
{
  
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
         $user = User::where('name','=',$request->name)->first();
        if($user)
        {
            if(Hash::check($request->password,$user->password))
            {
                $request->session()->put('loginId',$user->id);
                return redirect('home');
            }
            else{
                return back()->with('fail','Password not matches.');
            }
        }else{
            return back()->with('fail','user name is not registered.');
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
        $data = array();
        if(Session::has('loginId')){
            $data=User::where('id','=',Session::get('loginId'))->first();
        }
        else{
            return redirect('/');
        }
	    // $str_random=Str::random(12);
	    return view('homepage',compact('data'));
    }
    public function homelogout() 
    { 
        if(Session::has('loginId')){
            Session::pull('loginId');
        }
        else{
            return redirect('/');
        }
        return view('welcome')->with('success','you logout successfully');
    }
    public function addcust() 
    { 
        $data = array();
        if(Session::has('loginId')){
            $data=User::where('id','=',Session::get('loginId'))->first();
        }
        else{
            return redirect('/');
        }
	    $str_random=Str::random(12);
	    return view('Customer/addcustomer',compact('data'));
    }
    public function custReport() 
    { 
        $data = array();
       if(Session::has('loginId'))
        {
            $data=User::where('id','=',Session::get('loginId'))->first();
        }
        else
        {
            return redirect('/');
        }
        $calls= KCallRegister::with('custname')
        ->with('staffname')
        ->whereDay('Date', now()->day)
        ->orwhereDay('Ncalldate',now()->day)
        ->get();
         $cust = KCustomerRegister::all();
         $data1 = User::all();
         $phoneno = KCallRegister::distinct()->whereNotNull('phoneno')->get(['phoneno']);
         //echo($phone);
         return view('Calls/callsreport',compact('calls'),['data'=>$data,'cust'=>$cust,'phoneno'=>$phoneno,'$data1'=>$data1]);
    }
    public function addcall()
    { 
        $data = array();
        if(Session::has('loginId')){
            $data=User::where('id','=',Session::get('loginId'))->first();
        }
        else{
            return redirect('/');
        }
	    $str_random=Str::random(12);
        $cust=KCustomerRegister::all();
        $data1=User::all();
        return view('Calls/callregister',compact('data'),['cust'=>$cust,'data1'=>$data1]);
    }    
    public function addNewUser(Request $request)
    {
        $test2 = User::where('name',$request->name)
        ->get();
        if(count($test2)>0)
        {
            echo "Already available";
            return;
        }
        try
        {
            $user = new User;
            $user->name = $request->name;
            $user->email= $request->email;
            $user->password=$request->password;
            $user->confirpassword=$request->password;
            $user->usertype=$request->usertype;        
            $res=$user->save();
            if($res){
                return view('welcome')->with('success','you have register successfully');
            }
            else{
                return back()->with('fail','something wrong');
            }
        }
        catch(\Exception $e)
        {
            $result = array();
            $result['success'] = 0;
            $result['data']=$e;
            return json_encode($result);
        }
    }
    public function addcustomer(Request $request)
    {
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
            $cust->billtype=$request->billtype;
            $cust->software=$request->software;
            //print_r($cust);
            $cust->save();
            DB::commit();	
            $data = array();
            if(Session::has('loginId')){
                $data=User::where('id','=',Session::get('loginId'))->first();
            }
            else{
               return redirect('/');
            }
            $str_random=Str::random(12);
            return view('Customer/addcustomer',compact('str_random'));
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
            //$dt = now();
            //echo $dt->format('Y-m-d H:i:s');
            //exit();
            $calls->Date = date('Y-m-d H:i:s');
            $calls->phoneno=$request->phoneno;
            $calls->conperson=$request->conperson;
            $calls->work=$request->work;
            $calls->staff_id=$request->staff_id;
            $calls->callallocation=$request->callallocation;
            $calls->status=$request->status;
            $calls->remarks=$request->remarks;
            $calls->serialNo=$request->serialNo;
            $calls->Ncalldate=$request->Ncalldate;
            $calls->billtype=$request->billtype;
            $calls->software=$request->software;
            $calls->completeperson=$request->completeperson;
            $calls->completeddate=$request->completeddate;
            //print_r($calls);
            $calls->save();
            DB::commit();	
            $str_random=Str::random(12);
            $cust=KCustomerRegister::all();
            $data1=User::all();
            $data = array();
            if(Session::has('loginId')){
                 $data=User::where('id','=',Session::get('loginId'))->first();
            }
            else{
                return redirect('/');
            }
            return view('Calls/callregister',compact('data'),['cust'=>$cust,'data1'=>$data1]);
          
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
        $Sdate = $request->FDate;
        $Edate = $request->TDate;
        $calls = KCallRegister::with('custname')
        ->with('staffname')
        ->whereDate('Date','>=',$Sdate)
        ->whereDate('Date','<=',$Edate)
        ->orwhere('phoneno',$request->phoneno)
        ->orwhere('cust_id',$request->cust_id)
        ->where('status',$request->status)
        ->where('work',$request->work)
        ->where('billtype',$request->billtype)
        ->where('software',$request->software)
        ->get();       
         $cust  = KCustomerRegister::all();
         $data  = User::all();
         $phoneno = KCallRegister::distinct()->whereNotNull('phoneno')->get(['phoneno']);
         $cust1 = KCustomerRegister::where('id',$request->cust_id)
         ->get();
         return view('Calls/callsreport',compact('calls'),['data'=>$data,'cust'=>$cust,'cust1'=>$cust1,'phoneno'=>$phoneno]);
     }
    public function UpdateCalls($id)
    {
        $calls = KCallRegister::find($id);
        $custid = $calls->cust_id;
        $staffid = $calls->staff_id;        
        $cust  = KCustomerRegister::find($custid);
        $data1 = User::find($staffid);
        $data2 = User::all();
        $data = array();
        if(Session::has('loginId')){
            $data=User::where('id','=',Session::get('loginId'))->first();
        }
        else{
            return redirect('/');
        }
        return view('Calls/editcallsregister',compact('calls'),['data'=>$data,'cust'=>$cust,'data1'=>$data1,'data2'=>$data2]);
    }
    public function updateregister(Request $request)
    {
        try
        {
            DB::beginTransaction();
            $calls = new KCallRegister;
            $calls->cust_id=$request->cust_id;
            $calls->Date = date('Y-m-d H:i:s');
            $calls->phoneno=$request->phoneno;
            $calls->conperson=$request->conperson;
            $calls->work=$request->work;
            $calls->staff_id=$request->staff_id;            
            $calls->callallocation=$request->callallocation;
            $calls->status=$request->status;
            $calls->remarks=$request->remarks;
            $calls->serialNo=$request->serialNo;
            $calls->Ncalldate=$request->Ncalldate;
            $calls->billtype=$request->billtype;
            $calls->software=$request->software;
            $calls->completeperson=$request->completeperson;
            $calls->completeddate=$request->completeddate;
            //print_r($calls);
            $calls->save();
            DB::commit();  
            $data = array();
            if(Session::has('loginId')){
                $data=User::where('id','=',Session::get('loginId'))->first();
            }
            else{
               return redirect('/');
            }
            return redirect('home');        
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
