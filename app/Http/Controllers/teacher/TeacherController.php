<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB,Auth,Cache;
use App\Models\teacher;
use App\Models\student;
use App\Models\installment;
use App\Models\refund_request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    public function login()
    {
        return view('teacher.login');
    }

    public function teacher_login(Request $req)
    {
        $rememberStatus=$req->rememberStatus;
        $uname=$req->username;
        $psw=$req->password;
        if($rememberStatus==0)
        {
            if(Auth::guard('teacher')->attempt(['mobile' => $uname, 'password' => $psw]))
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
            
            if(Auth::guard('teacher')->attempt(['mobile' => $req->username, 'password' => $req->password],true))
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
        Auth::guard('teacher')->logout();
        return redirect()->route('teacher.login');
    }

   

   
    public function dashboard()
    {
        
        $header="Dashboard";
        return view('teacher.Dashboard',['header'=>$header]);
    }


        public function change_password()
    {
        return view('teacher.ChangePassword');
       
    }
    public function password_update(Request $req)
    {
        $currentpass=auth()->guard('teacher')->user()->password;
        $oldpass=$req->oldpass;
        $newpass=$req->newpass;

        if(Hash::check($oldpass, $currentpass))
        {
            teacher::where('id',auth()->guard('teacher')->user()->id)->update([
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
        $adm=teacher::where('id',auth()->guard('teacher')->user()->id)->first();
        return view('teacher.TeacherProfileEdit',['adm'=>$adm]);
    }

     public function admin_profile_update(Request $req)
    {
       
           $adm=teacher::where('id',auth()->guard('teacher')->user()->id)->first();
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
        
            teacher::where('id',auth()->guard('teacher')->user()->id)->update([
                'name'=>$req->cname,
                'mobile'=>$req->cmobile,
                'mail_id'=>$req->cmail,
                'profile_image'=>$new_name,

            ]) ;
            $data['success']="success";
        
        echo json_encode($data);
       
    }
}
