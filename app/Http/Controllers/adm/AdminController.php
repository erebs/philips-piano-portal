<?php

namespace App\Http\Controllers\adm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB,Auth,Cache;
use App\Models\admin_detail;
use App\Models\student;
use App\Models\installment;
use App\Models\refund_request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function admin_login(Request $req)
    {
        $rememberStatus=$req->rememberStatus;
        $uname=$req->username;
        $psw=$req->password;
        if($rememberStatus==0)
        {
            if(Auth::guard('admin')->attempt(['username' => $uname, 'password' => $psw]))
                {
                    $data['success']='Login success.Please wait...';
                }
            else
                {
                    $data['err']='Invalid user !';
                }    
        }
        else if($rememberStatus==1)
        {
            
            if(Auth::guard('admin')->attempt(['username' => $req->username, 'password' => $req->password],true))
                {
                    $data['success']='Login success.Please wait...';
                }
            else
                {
                    $data['err']='Invalid user !';
                }

        }

        echo json_encode($data);
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }

   

   
    public function dashboard()
    {
        $dt=date('Y-m-d');
        $oneWeekAgo = date('Y-m-d', strtotime('-1 week'));
        $start_date=date('Y-m-01');
        $end_date=date('Y-m-t');
        
        $header="Dashboard";
        $dt=date('Y-m-d');
        $activestd=student::where('approval','Approved')->where('valid_to','>=',$dt)->count();
        $expstd=student::where('approval','Approved')->where('valid_to','<',$dt)->count();
        $instcnt=installment::where('approval_status','Pending')->count();
        $refundcnt=refund_request::where('status','Pending')->count();
        $monstudents=student::select('id','name','mobile','created_at')->where('created_at','>=',$start_date)->where('created_at','<=',$end_date)->where('approval','Approved')->get();
        $wstudents=student::select('id','name','mobile','created_at')->where('created_at','>=',$oneWeekAgo)->where('created_at','<=',$dt)->where('approval','Approved')->get();
        $tstudents=student::select('id','name','mobile','created_at')->where('created_at',$dt)->where('approval','Approved')->get();

        return view('admin.Dashboard',['header'=>$header,'activestd'=>$activestd,'expstd'=>$expstd,'instcnt'=>$instcnt,'refundcnt'=>$refundcnt,'monstudents'=>$monstudents,'wstudents'=>$wstudents,'tstudents'=>$tstudents]);
    }

    public function change_password()
    {
        return view('admin.ChangePassword');
       
    }
    public function password_update(Request $req)
    {
        $currentpass=auth()->guard('admin')->user()->password;
        $oldpass=$req->oldpass;
        $newpass=$req->newpass;

        if(Hash::check($oldpass, $currentpass))
        {
            admin_detail::where('id',1)->update([
                'password'=>bcrypt($newpass)
            ]) ;
            $data['success']="success";
        }
        else{
            $data['err']="err";
        }
        echo json_encode($data);
       
    }

    public function edit_admin_profile()
    {
        $adm=admin_detail::where('id',1)->first();
        return view('admin.AdminProfileEdit',['adm'=>$adm]);
    }

     public function admin_profile_update(Request $req)
    {
       
           $adm=admin_detail::where('id',1)->first();
         $img = $req->file('img');
        if($img=='')
        {
            $new_name=$adm->profile_image;
        }
        else{
             $imgWillDelete = public_path() . '/admin/img/' . $adm->profile_image;
            File::delete($imgWillDelete);
          $image = $req->file('img');
             $new_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('admin/img'), $new_name);
            //$ins['Photo']=$new_name;
        }
        
            admin_detail::where('id',1)->update([
                'name'=>$req->cname,
                'mobile'=>$req->cmobile,
                'mail_id'=>$req->cmail,
                'profile_image'=>$new_name,

            ]) ;
            $data['success']="success";
        
        echo json_encode($data);
       
    }


    ////////////////////////////////


    
  
   
    
}
